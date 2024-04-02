<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('auth');
        $this->auth->cek_login();
	}

	public function index()
	{
		$this->auth->cek_login();
        // load view admin/overview.php
        $this->load->view("admin/service");
	}
}