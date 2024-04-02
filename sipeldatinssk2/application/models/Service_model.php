<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service_model extends CI_Model {

	public function all(){
		//query semua record di table services
		$hasil = $this->db->get('services');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('service_id', $id)
						  ->limit(1)
						  ->get('services');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_service){
		//Query INSERT INTO
		$this->db->insert('services', $data_service);
	}

	public function update($id, $data_service){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('service_id', $id)
				 ->update('services', $data_service);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('service_id', $id)
				 ->delete('services');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
}