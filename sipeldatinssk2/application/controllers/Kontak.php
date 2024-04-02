<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("service_model");
	}

	public function index()
	{
		$this->load->view("kontak");
	}

	public function add()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$pesan = $this->input->post('pesan');

		$data = array(
			'nama' => $nama,
			'email' => $email,
			'no_telpon' => $no_telpon,
			'pesan' => $pesan,
		);
		$this->session->set_flashdata('success', 'Pesan Berhasil Dikirim');
		$this->service_model->input_data($data, 'pesan_saran');
		redirect('kontak');
	}
}
