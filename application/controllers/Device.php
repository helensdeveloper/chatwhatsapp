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

	function unpair()
	{
		$apps_id = '1';
		$query=$this->db->get_where('apps', array('apps_id' => $apps_id));
		if ($query->num_rows()>0) {
			$row = $query->row_array();
			$apps_api = $row['apps_api'];
			$apps_token = $row['apps_token'];
			$apps_devicekey = $row['apps_devicekey'];
		}
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $apps_api.'/devices',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS => "",
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$apps_token
			],
		]);

		$response = curl_exec($curl);
		$data = json_decode($response, TRUE);
		foreach($data['data'] as $row){
			$getiddevice = $row["id"];
		}
		$curl2 = curl_init();
		curl_setopt_array($curl2, [
			CURLOPT_URL => $apps_api.'/devices/'.$getiddevice.'/unpair',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS => "",
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$apps_token
			],
		]);

		$response2 = curl_exec($curl2);
		$backtodevice = base_url().'device';
		redirect($backtodevice);
	}
} ?>