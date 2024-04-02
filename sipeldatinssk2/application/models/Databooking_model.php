<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class databooking_model extends CI_Model
{

	public function all()
	{
		//query semua record di table services
		$hasil = $this->db
			->select('form_booking.*, services.description')
			->select('form_booking.*, services.price')
			->join('services', 'services.service_id = form_booking.service_id', 'left')
			->get('form_booking');
			
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function allpesan()
	{
		//query semua record di table saran
		$hasil = $this->db->get('pesan_saran');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function delete($id)
	{
		//Query DELETE ... WHERE id=...
		$this->db->where('id', $id)
				 ->delete('form_booking');
	}

}
