<?php 
/**
  * 
  */
 class Chat extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	function index()
 	{
 		$this->load->view('chat/apps');
 	}
 	public function chatframe() {

		$chat_id = $_POST['id'];
		$name = $_POST['name'];
		$url = "/messages?chat_id=$chat_id&order_by=desc&limit=1000";
		$Resapi = $this->data_model->Resapi("$url", "");
//		 echo $Resapi;
//		 exit;

//		$chatdata = array_reverse(json_decode($Resapi, true)['data'], true);
		$chatdata = json_decode($Resapi, true)['data'];


        $query = $this->db->get_where('apps', array('apps_id' => 1));
        $rowapps = $query->row_array();
        $apps_api = $rowapps['apps_api'];

		$data['id'] = $chat_id;
		$data['apps_api'] = $apps_api;
		$data['name'] = $name;
		$data['chatdata'] = $chatdata;
		$data['result'] = json_decode($Resapi, true);
		$this->load->view('chat/chatframe', $data);
	}
 } ?>