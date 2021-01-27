<?php
$user = $this->session->userdata('uid');
$query=$this->db->get_where('users', array('u_id' => $user));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$u_name = $row['u_name'];
	$u_email = $row['u_email'];
	$u_role = $row['u_role'];
	$u_kid = $row['u_kid'];
	$u_last = $row['u_last'];
	$u_ip = $row['u_ip'];
	$u_photo = $row['u_photo'];
}

$apps = 1;
$query=$this->db->get_where('apps', array('apps_id' => $apps));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$apps_api = $row['apps_api'];
	$apps_token = $row['apps_token'];
	$apps_devicekey = $row['apps_devicekey'];
	$apps_update = $row['apps_update'];
	$apps_code = $row['apps_code'];
}
$api = file_get_contents('https://api.gatewayku.id/apps?apps_id='.$apps_code);
foreach (json_decode($api, TRUE) as $key => $value)
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title><?php echo APPS_NAME ?> - Apps Info </title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/users/user-profile.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/dashboard/dash_2.css')?>" rel="stylesheet" type="text/css" class="dashboard-sales" />
</head>
<body class="sidebar-noneoverflow">
	<div class="header-container fixed-top">
		<header class="header navbar navbar-expand-sm">
			<ul class="navbar-item flex-row">
				<li class="nav-item align-self-center page-heading">
					<div class="page-header">
						<div class="page-title">
							<h3>Device</h3>
						</div>
					</div>
				</li>
			</ul>
			<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

			<ul class="navbar-item flex-row search-ul">
			</ul>
			<ul class="navbar-item flex-row navbar-dropdown">
				<li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
					</a>
					<div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
						<div class="user-profile-section">
							<div class="media mx-auto">
								<img src="<?=base_url().'themes/img/'.$u_photo?>" class="img-fluid mr-2" alt="avatar">
								<div class="media-body">
									<h5><?=$u_name?></h5>
									<p>
										<?php if ($u_role == 1): ?>
											Admin
											<?php else: ?>
												Customer
										<?php endif ?>
									</p>
								</div>
							</div>
						</div>
						<?php $this->load->view('admin/profiledrop') ?>
					</div>
				</li>
			</ul>
		</header>
	</div>

	<div class="main-container" id="container">
		<div class="overlay"></div>
		<div class="cs-overlay"></div>
		<div class="search-overlay"></div>
		<?php $this->load->view('admin/menu') ?>
		<div id="content" class="main-content">
			<div class="layout-px-spacing">
				<div class="row layout-spacing">
					<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
						<div class="user-profile layout-spacing">
							<div class="widget-content widget-content-area">
								<div class="d-flex justify-content-between">
									<h3 class="">Devices Status</h3>
									<a class="mt-2 edit-profile"></a>
								</div>
								<div class="text-center user-info" id="getqr">
									<img src="<?=base_url().'fav-icon.png'?>" width="50%" alt="avatar">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-top-spacing">
						<div class="widget widget-account-invoice-one">
							<div class="widget-heading">
								<h5 class="">Website Info</h5>
							</div>
							<div class="widget-content">
								<div class="invoice-box">
									<div class="acc-total-info">
										<h5>Apps Detail</h5>
									</div>
									<div class="inv-detail" id="detail">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/footer') ?>
		</div>
	</div>
	<script src="<?=base_url('themes/admin/assets/js/libs/jquery-3.1.1.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/bootstrap/js/popper.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/assets/js/app.js')?>"></script>

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script src="<?=base_url('themes/admin/assets/js/custom.js')?>"></script>
	<script>
		function getqr()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url().'getfunc/GetQR'?>",
				success: function(response){
					$("#getqr").html(response);
				}
			});
		}
		function detail()
		{
			$.ajax({
				type: "GET",
				url: "<?php echo base_url().'getfunc/detail'?>",
				success: function(response){
					$("#detail").html(response);
				}
			});
		}
	</script>
	<script type="text/javascript">
		setInterval('detail();', 100);
	</script>
	<script type="text/javascript">
		setInterval('getqr();', 500);
	</script>
</body>
</html>