<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Inventory";
		$table = "barang";
		$content = "barang/view_barang";
		$data['barang'] = $this->myigniter_model->get($table);
		$this->template->output($data, $content);
	}

	public function tambahBarang()
	{
		$data['title'] = "Tambah Barang";
		$content = "barang/tambah_barang";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "barang";
		$data = array(
			'id' => $this->input->post('id'), 
			'nama' => $this->input->post('nama'), 
			'harga' => $this->input->post('harga'), 
			'stok' => $this->input->post('stok') 
			);
		$this->myigniter_model->addData($table, $data);
		redirect('inventory');
	}

	function updateBarang($id)
	{
		$table="barang";
		$condition['id'] = $id;

		$data['update'] = $this->myigniter_model->getData($table, $condition);

		$data['title'] = "Update Barang";
		$content = "barang/update_barang";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "barang";
		$condition['id'] = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama'), 
			'harga' => $this->input->post('harga'), 
			'stok' => $this->input->post('stok') 
		);
		$this->myigniter_model->updateData($table, $data, $condition);
		redirect('inventory');
	}

	function delete($table, $id)
	{
		$condition['id'] = $id;
		$this->myigniter_model->deleteData($table, $condition);
		redirect('inventory');
	}
}
/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */