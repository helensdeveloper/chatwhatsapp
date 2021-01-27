<?php
/**
 *
 */
class Data_model extends CI_Model {

	function Resapi($url, $data) {

		$query = $this->db->get_where('apps', array('apps_id' => 1));
		$row = $query->row_array();
		// return json_encode($row, true);exit;
		$baseurl = "$row[apps_api]";
		$key = "$row[apps_token]";
		$device_key = $this->session->userdata('device_key');
		$curl = curl_init();
		if ($data == "") {
			$headers = array(
				"Accept: application/json",
				"Authorization: Bearer $key",
				"device-key: $device_key",
			);
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_URL => $baseurl . $url,
				CURLOPT_HTTPHEADER => $headers,
			));
		} else
		if ($data == "delete") {
			$headers = array(
				"Accept: application/json",
				"Authorization: Bearer $key",
				"device-key: $device_key",
			);
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "DELETE",
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_URL => $baseurl . $url,
				CURLOPT_HTTPHEADER => $headers,
			));
		} else {
			$headers = array(
				'Content-Type: application/json',
				"Accept: application/json",
				"Authorization: Bearer $key",
				"device-key: $device_key",
			);
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $data,
				CURLOPT_URL => $baseurl . $url,
				CURLOPT_HTTPHEADER => $headers,
			));
		}

		$result = curl_exec($curl);
		if (curl_errno($curl)) {
			$error_msg = curl_error($curl);
		}
		curl_close($curl);
		return $result;
	}

	function DataJabatan() {
		$result = $this->db->query("SELECT * FROM jabatan");
		return $result;
	}

	function DataMaster() {
		$result = $this->db->query("SELECT * FROM karyawan");
		return $result;
	}

	function DataUsers() {
		$result = $this->db->query("SELECT * FROM users");
		return $result;
	}

	function AddCS($user, $pass, $email, $photo, $id, $k_status) {
		$data = array(
			'u_name' => $user,
			'u_pass' => $pass,
			'u_email' => $email,
			'u_role' => 2,
			'u_kid' => $id,
			'u_last' => '0000-00-00 00:00:00',
			'u_ip' => '',
			'u_stat' => $k_status,
			'u_photo' => $photo,
		);
		$this->db->insert('users', $data);
	}

	function AddKaryawan($k_nama, $k_jk, $k_phone, $k_kota, $k_lahir, $k_jabatan, $k_email) {
		$data = array(
			'k_nama' => $k_nama,
			'k_jk' => $k_jk,
			'k_kota' => $k_kota,
			'k_lahir' => $k_lahir,
			'k_jabatan' => $k_jabatan,
			'k_phone' => $k_phone,
			'k_email' => $k_email,
			'k_status' => 1,
		);
		$this->db->insert('karyawan', $data);
	}
}?>