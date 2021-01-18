<?php 
/**
  * 
  */
class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model', 'setting_model');
		$this->load->model('Auth_model', 'auth_model');
		error_reporting(0);
	}

	function index()
	{
		if ($this->session->userdata('logged') != true) {
 			redirect('');
 		}else{
 			$user = $this->session->userdata('uid');
 			$query=$this->db->get_where('users', array('u_id' => $user));
 			if ($query->num_rows()>0) {
 				$row = $query->row_array();
 				$role = $row['u_role'];
 			}
 			if ($role != 1) {
 				redirect('cs');
 			}else{
 				redirect('admin');
 			}
 		}
	}
} ?>