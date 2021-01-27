<?php 

class Getfunc extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}

	function GetQR()
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
			CURLOPT_URL => $apps_api.'/devices/'.$getiddevice.'/pair?html=true',
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
		echo $response2;
	}
	function detail()
	{
		$query=$this->db->get_where('apps', array('apps_id' => 1));
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
		foreach($data['data'] as $row){ ?>
			<div class="info-detail-2">
				<p>WA Name</p>
				<p><?php echo $row["wa_name"]?></p>
			</div>
			<div class="info-detail-2">
				<p>Phone Number</p>
				<p><?php echo $row["phone"]?></p>
			</div>
			<div class="info-detail-2">
				<p>WA Version</p>
				<p><?php echo $row["wa_version"]?></p>
			</div>
			<div class="info-detail-2">
				<p>Manufacture</p>
				<p><?php echo $row["manufacture"]?></p>
			</div>
			<div class="info-detail-2">
				<p>Battery Level</p>
				<p><?php echo $row["battery"].'%' ?></p>
			</div>
			<?php if ($row['status'] == 'PAIRED'): ?>
				<hr>
				<div class="info-detail-2">
					<center><span><a href="<?=base_url('device/unpair')?>" class="btn btn-primary">Unpair</a> Klik to Diconnect Whatsapp</span></center>
				</div>
				<hr>
			<?php endif ?>
		<?php }
	}
} ?>