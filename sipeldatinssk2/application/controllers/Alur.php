<?php

class Alur extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // load view home.php
        $this->load->view("alur");
	}
}