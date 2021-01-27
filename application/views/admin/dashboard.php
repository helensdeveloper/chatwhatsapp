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

$getapps = 1;
$query=$this->db->get_where('apps', array('apps_id' => $getapps));
if ($query->num_rows()>0) {
	$row = $query->row_array();
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
	<title><?php echo APPS_NAME ?> - Admin Dashboard </title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="<?=base_url('themes/admin/assets/css/loader.css')?>" rel="stylesheet" type="text/css" />
	<script src="<?=base_url('themes/admin/assets/js/loader.js')?>"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/plugins/apex/apexcharts.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('themes/admin/assets/css/dashboard/dash_2.css')?>" rel="stylesheet" type="text/css" class="dashboard-sales" />
</head>
<body class="sidebar-noneoverflow dashboard-sales">
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>
	<div class="header-container fixed-top">
		<header class="header navbar navbar-expand-sm">
			<ul class="navbar-item flex-row">
				<li class="nav-item align-self-center page-heading">
					<div class="page-header">
						<div class="page-title">
							<h3>Dashboard Admin</h3>
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
		<div class="search-overlay"></div>
		<?php $this->load->view('admin/menu') ?>
		<div id="content" class="main-content">
			<div class="layout-px-spacing">
				<div class="row layout-top-spacing">
					<div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
						<div class="widget widget-account-invoice-one">
							<div class="widget-heading">
								<h5 class="">Website Info</h5>
							</div>
							<div class="widget-content">
								<div class="invoice-box">
									<div class="acc-total-info">
										<h5>Apps Detail</h5>
									</div>
									<div class="inv-detail">
										<div class="info-detail-2">
											<p>APPS Name</p>
											<p><?php echo APPS_NAME ?></p>
										</div>
										<div class="info-detail-2">
											<p>APPS Code</p>
											<p><?php echo $value['apps_id'] ?></p>
										</div>
										<div class="info-detail-2">
											<p>APPS Version</p>
											<p><?php echo $value['apps_version'] ?></p>
										</div>
									</div>
									<div class="inv-action">
										<a href="" class="btn btn-outline-dark">Summary</a>
										<?php if (APPS_VERSI < $value['apps_version']): ?>
											
											<a href="" class="btn btn-success">Update</a>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
						<div class="widget widget-table-two">
							<div class="widget-heading">
								<h5 class="">Recent Users</h5>
							</div>
							<div class="widget-content">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th><div class="th-content">Customer</div></th>
												<th><div class="th-content">Username</div></th>
												<th><div class="th-content">Status</div></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($DataUsers->result() as $du): ?>
												<?php if ($du->u_id != 1): ?>
													<tr>
														<?php 
	                                                    $query=$this->db->get_where('karyawan', array('k_id' => $du->u_kid));
	                                                    if ($query->num_rows()>0) {
	                                                        $row = $query->row_array();
	                                                        $nama = $row['k_nama'];
	                                                    }
	                                                    ?>
														<td><div class="td-content customer-name"><img src="<?=base_url().'themes/img/'.$du->u_photo?>" alt="avatar"><?=$nama?></div></td>
														<td><div class="td-content product-brand"><?=$du->u_name?></div></td>
														<?php if ($du->u_stat != 1): ?>
															<td><div class="td-content"><span class="badge outline-badge-danger">Deactive</span></div></td>
															<?php else: ?>
																<td><div class="td-content"><span class="badge outline-badge-success">Active</span></div></td>
														<?php endif ?>
													</tr>
												<?php endif ?>
											<?php endforeach;?>
										</tbody>
									</table>
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
	<!-- END GLOBAL MANDATORY SCRIPTS -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
	<script src="<?=base_url('themes/admin/plugins/apex/apexcharts.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/assets/js/dashboard/dash_2.js')?>"></script>    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>