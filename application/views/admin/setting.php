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
}
$api = file_get_contents('https://api.gatewayku.id/apps?apps_id=4957124436');
foreach (json_decode($api, TRUE) as $key => $value)
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo APPS_NAME ?> - Master Data </title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="/themes/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/admin/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/themes/admin/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/themes/admin/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/themes/admin/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/themes/admin/plugins/table/datatable/dt-global_style.css">
    <link href="/themes/admin/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/themes/admin/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" href="/themes/font-awesome/css/font-awesome.min.css">
</head>
<body class="sidebar-noneoverflow">
	<div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Master Data</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>
            <ul class="navbar-item flex-row search-ul"></ul>
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
            	<div class="row layout-top-spacing" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                            	<table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            		<thead>
                            			<tr>
                            				<th>Name</th>
                            				<th class="text-center">Status</th>
                            				<th></th>
                            			</tr>
                            		</thead>
                            		<tbody>
                            			<tr>
                            				<td>Server API</td>
                            				<?php if ($apps_api != $value['apps_link']): ?>
                            					<td class="text-center"><span style="font-style: bold" class="text-danger"><b>Update Now</b></span></td>
                            				<?php else: ?>
                            					<td class="text-center"><span class="text-success"><b>Updated</b></span></td>
                            				<?php endif ?>
                            				<?php if ($apps_api != $value['apps_link']): ?>
                            					<td class="text-center"><a href="<?=base_url('update/ServerAPI')?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg></a></td>
                            				<?php else: ?>
                            					<td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></td>
                            				<?php endif ?>
                            			</tr>
                            			<tr>
                            				<td>Server Token</td>
                            				<?php if ($apps_token != NULL): ?>
                            					<td class="text-center"><span class="text-success"><b>Completed</b></span></td>
                            				<?php else: ?>
                            					<td class="text-center"><span class="text-danger"><b>In-Completed</b></span></td>
                            				<?php endif ?>
                            				<?php 
                            				if ($apps_token != NULL) { ?>
                            				 	<td class="text-center"><a data-toggle="modal" data-target="#appstoken"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg></a></td>
                            				<?php } else { ?>
                            					<td class="text-center"><a data-toggle="modal" data-target="#appstoken"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td>
                            				<?php } ?>
                            			</tr>
                            			<tr>
                            				<td>Server DeviceKey</td>
                            				<?php if ($apps_devicekey != NULL): ?>
                            					<td class="text-center"><span class="text-success"><b>Completed</b></span></td>
                            				<?php else: ?>
                            					<td class="text-center"><span class="text-danger"><b>In-Completed</b></span></td>
                            				<?php endif ?>
                            				<?php 
                            				if ($apps_devicekey != NULL) { ?>
                            				 	<td class="text-center"><a data-toggle="modal" data-target="#devicekey"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg></a></td>
                            				<?php } else { ?>
                            					<td class="text-center"><a data-toggle="modal" data-target="#devicekey"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td>
                            				<?php } ?>
                            			</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/footer') ?>
        </div>
        <div class="modal fade" id="appstoken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apps Token</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <form action="<?=base_url('update/AppsUpdate')?>" method="POST" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <p>Token Key</p>
                                <input id="p-text" type="text" name="appstoken" placeholder="Masukan Token" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="devicekey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Device Key</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <form action="<?=base_url('update/DeviceKey')?>" method="POST" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <p>Device Key</p>
                                <input id="p-text" type="text" name="DeviceKey" placeholder="Masukan Device Key" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/themes/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/themes/admin/bootstrap/js/popper.min.js"></script>
    <script src="/themes/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/themes/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/themes/admin/assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="/themes/admin/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/themes/admin/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/themes/admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/themes/admin/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/themes/admin/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/themes/admin/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <!-- <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        } );
    </script> -->
</body>
</html>