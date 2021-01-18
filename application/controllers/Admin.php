<?php 
/**
  * 
  */
class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model', 'setting_model');
		$this->load->model('Data_model', 'data_model');
		error_reporting(0);
	}

	function index()
	{
		cek_sesi();
		hasPermission([1]);
		$data['DataUsers'] = $this->data_model->DataUsers();
		$this->load->view('admin/dashboard',$data);
	}
} ?>