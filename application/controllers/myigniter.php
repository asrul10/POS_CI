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
		$data['title'] = "Kasri 1.0";
		$content = "myigniter_view";
		$this->template->output($data, $content);
	}

	public function keranjang()
	{
		$table = "barang";
		$condition['id'] = $this->input->post('kode');
		$qty = $this->input->post('qty');
		$get = $this->myigniter_model->getData($table, $condition);
		$jml = $get->num_rows();

        if($jml == 0){ 
        	echo "<script>
        	     alert('Barang tidak ada');
			</script>";
        }else{
        	foreach ($get->result() as $row) {
				$data = array(
					'id'      => $row->id,
					'qty'     => $qty,
					'price'   => $row->harga_jual,
					'name'    => $row->nama
				);
				$this->cart->insert($data);
			}
		}
		redirect('myigniter');
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
		$this->template->output($data, $content);
	}

	public function setoran()
	{
		$table = "penjualan";
		$condition['setor'] = '0';
    	$data['setoran'] = $this->myigniter_model->setoran($table, $condition);

		$data['title'] = "Penyetoran";
		$content = "setoran";
		$this->template->output($data, $content);
	}

	public function setoranSubmit()
	{
		$table = "setor";

		$data['title'] = "penjualan";
		$content = "penjualan";
		$this->template->output($data, $content);
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