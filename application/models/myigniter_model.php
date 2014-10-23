<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myigniter_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	function get($table)
	{
		$this->db->select("*");
		$this->db->from($table);

		return $this->db->get();
	}

	function getData($table, $condition)
	{
        $this->db->where($condition); 
        $this->db->select("*");
        $this->db->from($table);
        
        return $this->db->get();
	}

	function addData($table,$data)
	{
		$this->db->insert($table, $data);
	}

	function updateData($table, $data, $condition)
	{
        $this->db->where($condition);
        $this->db->update($table, $data);
	}

	function deleteData($table, $condition)
	{
        $this->db->where($condition);
        $this->db->delete($table);
	}

	function setoran($table, $condition)
	{
		$this->db->group_by("tgl"); 
		$this->db->where($condition); 
        $this->db->select("*");
        $this->db->from($table);
        
        return $this->db->get();
	}

	function totalSetor($table, $condition)
	{
		$this->db->select_sum('total_harga');
		$this->db->where($condition); 
        $this->db->from($table);

        return $this->db->get();
	}
}

/* End of file myigniter_model.php */
/* Location: ./application/models/myigniter_model.php */