<?php 
/**
  * 
  */
 class Setting extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Data_model', 'data_model');
		$this->load->model('Sending_model', 'sending_model');
 		error_reporting(0);
 	}

 	function index()
 	{
 		cek_sesi();
		hasPermission([1]);
 		$this->load->view('admin/setting');
 	}

 	function info()
 	{
 		$this->load->view('admin/appsinfo');
 	}
 } ?>