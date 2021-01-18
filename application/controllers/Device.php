<?php 
/**
  * 
  */
class Device extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		cek_sesi();
		hasPermission([1]);
		$this->load->view('admin/device');
	}
} ?>