<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myigniter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
	}

	
	public function index()
	{
		$table = "barang";
		$data['cari'] = $this->myigniter_model->get($table);

		$data['title'] = "Kasri 1.0";
		$data['judule'] = "SEGO PECEL POS";
		$content = "myigniter_view";
		$this->template->output($data, $content);
	}

	public function daftarkeranjang()
	{
		$this->load->view('keranjang_view');
	}

	public function total()
	{
		echo $this->cart->total();
	}

	public function keranjang($id)
	{
		$table = "barang";
		$condition['id'] = $id;
		$get = $this->myigniter_model->getData($table, $condition);
		$jml = $get->num_rows();
		$tambah = TRUE;

		foreach ($this->cart->contents() as $items){
			$kode = $id;
			  if($items['id'] == $kode){
			  	$total = $items['qty'] + 1;
			  	$data = array(
					'rowid'   => $items['rowid'],
					'qty'     => $total
				);

				$this->cart->update($data);
				$tambah = FALSE;
				break;
			  }
		}

		if($tambah){
	        if($jml == 0){
	        	/*
	        	echo "<script>
	        	alert('Id barang yang dimasukan tidak ada!');
	        	</script>";
	        	*/
	        }else{
	        	foreach ($get->result() as $row) {
					$data = array(
						'id'      => $row->id,
						'qty'     => 1,
						'price'   => $row->harga_jual,
						'name'    => $row->nama
					);
					$this->cart->insert($data);
					break;
				}
			}
		}
	}

	public function client()
	{
		$this->load->view('client_kasir');
	}

	public function penjualan()
	{
		$table = "penjualan";
		$data['penjualan'] = $this->myigniter_model->get($table);

		$data['title'] = "penjualan";
		$content = "penjualan";
		$data['judule'] = "PENJUALAN";
		$this->template->output($data, $content);
	}

	public function setoran()
	{
		$table = "penjualan";
		$condition['setor'] = '0';
    	$data['setoran'] = $this->myigniter_model->setoran($table, $condition);

		$data['title'] = "Penyetoran";
		$content = "setoran";
		$data['judule'] = "SETORAN";
		$this->template->output($data, $content);
	}

	public function setoranSubmit()
	{
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		$tgl = mdate($datestring);

		$tgl_jual = $this->input->post('tgljual');
		$tablePenjualan = "penjualan";
		$condition['tgl'] = $tgl_jual;
		$selectTotal = $this->myigniter_model->totalSetor($tablePenjualan, $condition);
		foreach ($selectTotal->result() as $tot) {
			$total_jual = $tot->total_harga;
			$total_setor = $this->input->post('setor');
			$selisih = $total_setor - $total_jual;
			$table = "setor";
			$data = array(
				'penyetor' => $this->input->post('nama') , 
				'tgl_jual' => $tgl_jual , 
				'tgl_setor' => $tgl , 
				'total_jual' => $total_jual, 
				'total_setor' => $total_setor, 
				'selisih' => $selisih
				);
			$this->myigniter_model->addData($table, $data);
		}
		$data = array('setor' => 1, );
		$updatePenjualan = $this->myigniter_model->updateData($tablePenjualan, $data, $condition);

		redirect('myigniter/setoran','refresh');
	}

	public function deleterow($id)
	{
		$data = array(
			'rowid'   => $id,
			'qty'     => 0
		);

		$this->cart->update($data);
		redirect('myigniter'); 
	}
	public function delete()
	{
        $this->cart->destroy();
   		redirect('myigniter');
	}

    public function selesai()
    {
    	$this->load->helper('date');
		$datestring = "%Y-%m-%d";

		$tgl = mdate($datestring);
    	$table = "penjualan";
    	foreach ($this->cart->contents() as $insert){
    		$total = $insert['price']*$insert['qty'];
    		$data = array(
    			'id_barang' => $insert['id'], 
    			'qty' => $insert['qty'], 
    			'total_harga' => $total, 
    			'tgl' => $tgl 
    			);
    		
    		$this->myigniter_model->addData($table, $data);
    	}
        $this->cart->destroy();
   		redirect('myigniter');
    }

}

/* End of file myigniter.php */
/* Location: ./application/controllers/myigniter.php */