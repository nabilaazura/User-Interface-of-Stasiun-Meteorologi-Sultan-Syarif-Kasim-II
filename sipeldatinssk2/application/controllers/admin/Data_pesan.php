<?php

class Data_pesan extends CI_Controller {
        public function __construct()
        {
	parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();
        $this->load->model('databooking_model');
        }

	public function index()
	{
        $this->auth->cek_login();
        // load view admin/data_booking.php
        $data['pesan_saran'] = $this->databooking_model->allpesan();
        $this->load->view("admin/data_pesan", $data);
	}
}