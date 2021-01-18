<?php 
/**
  * 
  */
class Login extends CI_Controller
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
		cek_sesi_login();
		$this->load->view('auth/login');
	}

	function logout(){
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}

	function method()
	{
		$username = $this->input->post(strip_tags('username'));
		$password = $this->input->post(strip_tags('password'));
		$enkrip 	= base64_encode(md5($password));
		$cek_login	= $this->auth_model->cek_login($username,$enkrip);
		if ($cek_login->num_rows() == 1) {
			$row = $cek_login->row();
			$this->session->set_userdata(array(
				'logged'	=> 'true',
				'uid'      	=> $row->u_id,
				'role'     	=> $row->u_role
			));
			$dtime 	  = date('d-m-Y H:i:s');
			$ip = $this->auth_model->getClientIP();
			$this->auth_model->lastlogin($username,$dtime,$ip);
			$data = 1;
			$query = $this->db->get_where('apps', array('apps_id' => $data));
			if($query->num_rows() > 0){
				$row = $query->row_array();
				$apps_code = $row['apps_code'];
				if ($apps_code != NULL) {
					$api = file_get_contents('https://api.gatewayku.id/apps?apps_id='.$apps_code);
					foreach (json_decode($api, TRUE) as $key => $value);
					$apps_id = $value['apps_id'];
					if ($apps_code == $apps_id) {
						$url=base_url('dashboard');
						redirect($url);
					}else{
						$url = base_url('verify');
						redirect($url);
					}
				}else{
					$url = base_url('verify');
					redirect($url);
				}
			}
		}else{
			$url=base_url('login');
			echo $this->session->set_flashdata('msg','<span style="color: white; background: red; font-size: 20px">Error!! Username atau Password Salah</span>');
			redirect($url);
		}
	}
} ?>