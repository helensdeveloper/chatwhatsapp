<?php 
$apps_id = '1';
$query=$this->db->get_where('apps', array('apps_id' => $apps_id));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$apps_api = $row['apps_api'];
	$apps_token = $row['apps_token'];
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

?>

<?php foreach($data as $row){ ?>
	<?php echo $row["id"]; ?>
<?php } ?>