<?php 
/**
  * 
  */
class Dashboard extends CI_Controller
{
	var $api ="";	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model', 'setting_model');
		$this->api= "https://cintarest.helenscloud.web.id";
		error_reporting(0);
	}

	function index()
	{
		cek_sesi();
		$apps = $this->setting_model->apps()->row_array();
		$data['apps_corp']	= $apps['apps_corp'];
		$data['apps_email']	= $apps['apps_email'];
		$this->load->view('admin/dashboard',$data);
	}
} ?>