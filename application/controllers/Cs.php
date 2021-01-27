<?php
/**
 *
 */
class Cs extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Data_model', 'data_model');
		// error_reporting(0);
	}

	public function index() {
		if ($this->session->userdata('logged') != true) {
			redirect('');
		} else {
			if ($this->session->userdata('role') == "1") {
				redirect('dashboard');exit;
			}
			$query = $this->db->get_where('apps', array('apps_id' => 1));
			$rowapps = $query->row_array();
			$url = "/devices";
			$Resapi = json_decode($this->data_model->Resapi("$url", ""), true);
			if ($Resapi['data'][0]['status'] != "PAIRED") {
				$this->session->sess_destroy();
				$url = base_url('');
			}
			$url = "/chats";
			$Resapi = $this->data_model->Resapi("$url", "");
			$data['result'] = json_decode($Resapi, true);
			$this->load->view('cs/index', $data);}
	}

	public function chatlistframe() {
        $url = "/chats";
        $Resapi = $this->data_model->Resapi("$url", "");
        $data['result'] = json_decode($Resapi, true);
        $this->load->view('cs/chatlistframe', $data);

	}

	public function chatframe() {

		$chat_id = $_POST['id'];
		$name = $_POST['name'];
		$url = "/messages?chat_id=$chat_id&order_by=asc&limit=1000";
		$Resapi = $this->data_model->Resapi("$url", "");
//		 echo $Resapi;
//		 exit;

//		$chatdata = array_reverse(json_decode($Resapi, true)['data'], true);
		$chatdata = json_decode($Resapi, true)['data'];

		$data['id'] = $chat_id;
		$data['name'] = $name;
		$data['chatdata'] = $chatdata;
		$data['result'] = json_decode($Resapi, true);
		$this->load->view('cs/chatframe', $data);
	}
	public function rest_checkchat() {

		$lastid = $_POST['lastid'];
		$chat_id = $_POST['id'];
		$url = "/messages?chat_id=$chat_id&order_by=asc&limit=1";
		$Resapi = $this->data_model->Resapi("$url", "");
//		 echo $lastid;
        $checkid= json_decode($Resapi,true)['data'][0]['id'];

		 if ($lastid!=$checkid){
		     echo "true";
         }else{echo "false";}
		 exit;

	}

	function rest_sendchat() {
		// print_r($_POST);exit;
		$dataarr = [
			"to" => $_POST['id'],
			"message" => $_POST['message'],
			"reply_for" => "",
		];
		$datarest = json_encode($dataarr, true);
		$id = $_POST['id'];
		// echo $id;exit;
		$url = "/messages/send-text";
		$devices = $this->data_model->Resapi("$url", "$datarest");
		echo $devices;exit;
	}

	function rest_sendchatfile() {
		// echo $_SERVER['DOCUMENT_ROOT'];exit;
		// print_r($_SERVER['DOCUMENT_ROOT']);exit;
		//		 print_r($_FILES);exit;
		$path = $_FILES['file']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

//         echo $ext;exit;
		//		 print_r($_SERVER);exit;
		// print_r($_POST);exit;
		$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/upload/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		// echo $target_file;exit;
		$fileup = $_SERVER['HTTP_HOST'] . "/upload/" . basename($_FILES["file"]["name"]);
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//			echo $fileup;
		} else {
//			echo "Sorry, there was an error uploading your file.";
		}
//		  exit;/

		if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif") {
			$typeupload = "image";
		} else {
			$typeupload = "document";

		}
		$dataarr = [
			"to" => $_POST['id'],
			"message" => "File Send",
			// "message"=>$_POST['message'],
			"media_url" => "http://" . $fileup,
			"type" => $typeupload,
		];
		$datarest = json_encode($dataarr, true);
		$id = $_POST['id'];
		// echo $id;exit;
		$url = "/messages/send-media";
		$devices = $this->data_model->Resapi("$url", "$datarest");
		echo $devices;exit;
	}

	// function __construct() {
	// 	parent::__construct();
	// }

	// function index() {
	// 	// $this->load->view('apps');
	// }
}?>