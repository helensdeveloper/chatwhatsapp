<?php 
/**
  * 
  */
class Verify extends CI_Controller
{

	function __construct()
	{
 		parent::__construct();
 		error_reporting(0);
	}

	function index()
	{
		$this->load->view('auth/active');
	}

	function get()
	{
		$apps_code = $this->input->post('code');
		$api = file_get_contents('https://api.gatewayku.id/apps?apps_id='.$apps_code);
		foreach (json_decode($api, TRUE) as $key => $value);
		$apps_id = $value['apps_id'];
		$apps_token = $value['apps_token'];
		$apps_device = $value['apps_device'];
		$apps_link = $value['apps_link'];
		if ($apps_code == $apps_id) {
			$this->db->set('apps_code', $apps_id);
			$this->db->set('apps_api', $apps_link);
			$this->db->set('apps_token', $apps_token);
			$this->db->set('apps_devicekey', $apps_device);
			$this->db->where('apps_id', 1);
			$this->db->update('apps');
			$url=base_url('admin');
			redirect($url);
		}else{
			$url=base_url('verify');
			echo $this->session->set_flashdata('msg','<span style="color: white; background: red; font-size: 20px">Apps Code Not Valid</span>');
			redirect($url);
		}
	}
} ?>