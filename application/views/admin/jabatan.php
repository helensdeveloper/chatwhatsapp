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
$api = file_get_contents('https://api.gatewayku.id/apps?apps_id=4957124436');
foreach (json_decode($api, TRUE) as $key => $value)
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo APPS_NAME ?> - Jabatan </title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('themes/admin/plugins/table/datatable/datatables.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('themes/admin/plugins/table/datatable/dt-global_style.css')?>">
</head>
<body class="sidebar-noneoverflow">
	<div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Jabatan</h3>
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
            	<div class="row layout-top-spacing" id="cancel-row">
            		<div class="col-xl-5 col-lg-12 col-sm-12  layout-spacing">
                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Input Jabatan</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <div class="row">
                                        <div class="col-lg-12 col-12 mx-auto">
                                            <form method="post" action="<?=base_url('admin/data/inputjabatan')?>">
                                                <div class="form-group">
                                                    <label for="t-text" class="sr-only">Jabatan</label>
                                                    <input id="t-text" type="text" name="jabatan" placeholder="Some Text..." class="form-control" required>
                                                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                                                </div>
                                            </form>
                                        </div>                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                        	<th>Position</th>
                                            <!-- <th class="no-content"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($DataJabatan->result() as $dj): ?>
                                    		<tr>
                                    			<td><?=$dj->j_nama?></td>
                                    		</tr>
                                    	<?php endforeach;?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        	<th>Position</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?=base_url('themes/admin/plugins/table/datatable/datatables.js')?>"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>