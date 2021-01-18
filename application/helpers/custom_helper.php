<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cek_sesi')) {
	function cek_sesi() {
		$CI =& get_instance();
		$sesi = $CI->session->userdata('logged');
		if ($sesi != 'true') {
			redirect('');
		}
	}
}

if (!function_exists('cek_sesi_login')) {
	function cek_sesi_login() {
		$CI =& get_instance();
		$sesi = $CI->session->userdata('logged');
		if ($sesi == 'true') {
			redirect('dashboard');
		}
	}
}

function generate($input, $strength = 16) {
	$input_length = strlen($input);
	$random_string = '';
	for($i = 0; $i < $strength; $i++) {
		$random_character = $input[mt_rand(0, $input_length - 1)];
		$random_string .= $random_character;
	}

	return $random_string;
}

if (!function_exists('notif')) {
	function notif() {
		$CI =& get_instance();
		return $CI->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h4>Akses Ditolak</h4><p>Anda Tidak Memiliki Akses Ke Halaman Ini.</p></div>');
	}
}

if (!function_exists('hasPermission')) {
	function hasPermission($arr) {
		$CI =& get_instance();
		$current = $CI->session->userdata('role');
		if (in_array($current, $arr)) {
			return true;
		} else {
			notif('error','Anda Belum Melakukan Set PIN !!');
			redirect('dashboard');
		}
	}
}
?>