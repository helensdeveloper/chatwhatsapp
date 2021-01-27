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
$query=$this->db->get_where('karyawan', array('k_id' => $u_kid));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$k_nama = $row['k_nama'];
	$k_jabatan = $row['k_jabatan'];
}
$query=$this->db->get_where('jabatan', array('j_id' => $k_jabatan));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$j_nama = $row['j_nama'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Chat | Customer Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Helens Developer" name="author" />
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/themes/assets/libs/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="/themes/assets/libs/owl.carousel/assets/owl.theme.default.min.css">
	<link href="/themes/assets/css/bootstrap-dark.min.css" id="bootstrap-dark-style" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/app-dark.min.css" id="app-dark-style" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="layout-wrapper d-lg-flex">
		<div class="side-menu flex-lg-column mr-lg-1">
			<div class="navbar-brand-box">
				<a href="" class="logo logo-dark">
					<span class="logo-sm">
						<img src="<?=base_url('fav-icon.ico')?>" alt="" height="30">
					</span>
				</a>
				<a href="" class="logo logo-light">
					<span class="logo-sm">
						<img src="<?=base_url('fav-icon.ico')?>" alt="" height="30">
					</span>
				</a>
			</div>
			<div class="flex-lg-column my-auto">
				<ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Profile">
						<a class="nav-link" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab">
							<i class="ri-user-2-line"></i>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Chats">
						<a class="nav-link active" id="pills-chat-tab" data-toggle="pill" href="#pills-chat" role="tab">
							<i class="ri-message-3-line"></i>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Contacts">
						<a class="nav-link" id="pills-contacts-tab" data-toggle="pill" href="#pills-contacts" role="tab">
							<i class="ri-contacts-line"></i>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Settings">
						<a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#pills-setting" role="tab">
							<i class="ri-settings-2-line"></i>
						</a>
					</li>
					<li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none">
						<a class="nav-link dropdown-toggle" href="javascript: void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?=base_url().'themes/img/'.$u_photo?>" alt="" class="profile-user rounded-circle">
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?=base_url('logout')?>">Log out <i class="ri-logout-circle-r-line float-right text-muted"></i></a>
						</div>
					</li>
				</ul>
			</div>
			<div class="flex-lg-column d-none d-lg-block">
				<ul class="nav side-menu-nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" id="light-dark" href="#" data-toggle="tooltip" data-trigger="hover" data-placement="right" title="Dark / Light Mode">
							<i class="ri-sun-line theme-mode-icon"></i>
						</a>
					</li>

					<li class="nav-item btn-group dropup profile-user-dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?=base_url().'themes/img/'.$u_photo?>" alt="" class="profile-user rounded-circle">
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?=base_url('logout')?>">Log out <i class="ri-logout-circle-r-line float-right text-muted"></i></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="chat-leftsidebar mr-lg-1">
			<div class="tab-content">
				<div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
					<div>
						<div class="px-4 pt-4">
							<div class="user-chat-nav float-right">
								<div class="dropdown">
									<a href="javascript: void(0);" class="font-size-18 text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ri-more-2-fill"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Edit</a>
										<a class="dropdown-item" href="#">Action</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Another action</a>
									</div>
								</div>
							</div>
							<h4 class="mb-0">My Profile</h4>
						</div>
						<div class="text-center p-4 border-bottom">
							<div class="mb-4">
								<img src="<?=base_url().'themes/img/'.$u_photo?>" class="rounded-circle avatar-lg img-thumbnail" alt="">
							</div>

							<h5 class="font-size-16 mb-1 text-truncate"><?=ucwords($u_name)?></h5>
						</div>
						<div class="p-4 user-profile-desc" data-simplebar>
							<div id="profile-user-accordion-1" class="custom-accordion">
								<div class="card shadow-none border mb-2">
									<a href="#profile-user-collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="profile-user-collapseOne">
										<div class="card-header" id="profile-user-headingOne">
											<h5 class="font-size-14 m-0">
												<i class="ri-user-2-line mr-2 align-middle d-inline-block"></i> About
												<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
											</h5>
										</div>
									</a>
									<div id="profile-user-collapseOne" class="collapse show" aria-labelledby="profile-user-headingOne" data-parent="#profile-user-accordion-1">
										<div class="card-body">
											<div>
												<p class="text-muted mb-1">Name</p>
												<h5 class="font-size-14"><?=$k_nama?></h5>
											</div>
											<div class="mt-4">
												<p class="text-muted mb-1">Email</p>
												<h5 class="font-size-14"><?=$u_email?></h5>
											</div>
											<div class="mt-4">
												<p class="text-muted mb-1">Time</p>
												<h5 class="font-size-14" id="timestamp"></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
					<div>
						<div class="px-4 pt-4">
							<h4 class="mb-4">Chats</h4>
							<div class="search-box chat-search-box">
								<div class="input-group mb-3 bg-light  input-group-lg rounded-lg">
									<div class="input-group-prepend">
										<button class="btn btn-link text-muted pr-1 text-decoration-none" type="button">
											<i class="ri-search-line search-icon font-size-18"></i>
										</button>
									</div>
									<input type="text" class="form-control bg-light" placeholder="Search messages or users">
								</div>
							</div>
						</div>
						<div class="px-2">
							<div class="chat-message-list" data-simplebar>
								<ul class="list-unstyled chat-list chat-user-list">
									<?php foreach ($result as $data) {?>
										<li>
											<a href="#" onclick="loadchat('<?=$data['id']?>','<?=$data['name']?>');">
												<div class="media">

													<div class="chat-user-img online align-self-center mr-3">
														<img src="https://via.placeholder.com/100x100.png?text=profile" class="rounded-circle avatar-xs" alt="">
														<span class="user-status"></span>
													</div>

													<div class="media-body overflow-hidden">
														<h5 class="text-truncate font-size-15 mb-1"><?=$data['name']?></h5>
														<p class="chat-user-message text-truncate mb-0"><?=$data['id']?></p>
													</div>
													<div class="font-size-11">05 min</div>
												</div>
											</a>
										</li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
				<!-- Start Contact content -->
				<div>
					<div class="p-4">
						<div class="user-chat-nav float-right">
							<div data-toggle="tooltip" data-placement="bottom" title="Add Contact">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-link text-decoration-none text-muted font-size-18 py-0" data-toggle="modal" data-target="#addContact-exampleModal">
									<i class="ri-user-add-line"></i>
								</button>
							</div>
						</div>
						<h4 class="mb-4">Contacts</h4>

						<!-- Start Add contact Modal -->
						<div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title font-size-16" id="addContact-exampleModalLabel">Add Contact</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body p-4">
										<form>
											<div class="form-group mb-4">
												<label for="addcontactemail-input">Email</label>
												<input type="email" class="form-control" id="addcontactemail-input" placeholder="Enter Email">
											</div>
											<div class="form-group">
												<label for="addcontact-invitemessage-input">Invatation Message</label>
												<textarea class="form-control" id="addcontact-invitemessage-input" rows="3" placeholder="Enter Message"></textarea>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Invite Contact</button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Add contact Modal -->

						<div class="search-box chat-search-box">
							<div class="input-group bg-light  input-group-lg rounded-lg">
								<div class="input-group-prepend">
									<button class="btn btn-link text-decoration-none text-muted pr-1" type="button">
										<i class="ri-search-line search-icon font-size-18"></i>
									</button>
								</div>
								<input type="text" class="form-control bg-light " placeholder="Search users..">
							</div>
						</div>
						<!-- End search-box -->
					</div>
					<!-- end p-4 -->

					<!-- Start contact lists -->
					<div class="p-4 chat-message-list chat-group-list" data-simplebar>

						<div>
							<div class="p-3 font-weight-bold text-primary">
								A
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Albert Rodarte</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Allison Etter</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- end contact list A -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								C
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Craig Smiley</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- end contact list C -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								D
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Daniel Clay</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Doris Brown</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<!-- end contact list D -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								I
							</div>

							<ul class="list-unstyled contact-list">

								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Iris Wells</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- end contact list I -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								J
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Juan Flakes</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">John Hall</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Joy Southern</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- end contact list J -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								M
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Mary Farmer</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Mark Messer</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Michael Hinton</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<!-- end contact list M -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								O
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Ossie Wilson</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<!-- end contact list O -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								P
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Phillis Griffin</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Paul Haynes</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<!-- end contact list P -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								R
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Rocky Jackson</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<!-- end contact list R -->

						<div class="mt-3">
							<div class="p-3 font-weight-bold text-primary">
								S
							</div>

							<ul class="list-unstyled contact-list">
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Sara Muller</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Simon Velez</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="media align-items-center">
										<div class="media-body">
											<h5 class="font-size-14 m-0">Steve Walker</h5>
										</div>

										<div class="dropdown">
											<a href="#" class="text-muted dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="ri-more-2-fill"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Share <i class="ri-share-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-right text-muted"></i></a>
												<a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-right text-muted"></i></a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
						<!-- end contact list S -->
					</div>
					<!-- end contact lists -->
				</div>
				<!-- Start Contact content -->
			</div>
			<!-- End contacts tab-pane -->

			<!-- Start settings tab-pane -->
			<div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
				<!-- Start Settings content -->
				<div>
					<div class="px-4 pt-4">
						<h4 class="mb-0">Settings</h4>
					</div>

					<div class="text-center border-bottom p-4">
						<div class="mb-4 profile-user">
							<img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="">
							<button type="button" class="btn bg-light avatar-xs p-0 rounded-circle profile-photo-edit">
								<i class="ri-pencil-fill"></i>
							</button>
						</div>

						<h5 class="font-size-16 mb-1 text-truncate">Patricia Smith</h5>
						<div class="dropdown d-inline-block mb-1">
							<a class="text-muted dropdown-toggle pb-1 d-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Available <i class="mdi mdi-chevron-down"></i>
							</a>

							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Available</a>
								<a class="dropdown-item" href="#">Busy</a>
							</div>
						</div>
					</div>
					<!-- End profile user -->

					<!-- Start User profile description -->
					<div class="p-4 user-profile-desc" data-simplebar>

						<div id="profile-setting-accordion" class="custom-accordion">
							<div class="card shadow-none border mb-2">
								<a href="#profile-setting-personalinfocollapse" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="profile-setting-personalinfocollapse">
									<div class="card-header" id="profile-setting-personalinfoheading">
										<h5 class="font-size-14 m-0">
											Personal Info
											<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
										</h5>
									</div>
								</a>

								<div id="profile-setting-personalinfocollapse" class="collapse show" aria-labelledby="profile-setting-personalinfoheading" data-parent="#profile-setting-accordion">
									<div class="card-body">

										<div class="float-right">
											<button type="button" class="btn btn-light btn-sm"><i class="ri-edit-fill mr-1 align-middle"></i> Edit</button>
										</div>

										<div>
											<p class="text-muted mb-1">Name</p>
											<h5 class="font-size-14">Patricia Smith</h5>
										</div>

										<div class="mt-4">
											<p class="text-muted mb-1">Email</p>
											<h5 class="font-size-14">adc@123.com</h5>
										</div>

										<div class="mt-4">
											<p class="text-muted mb-1">Time</p>
											<h5 class="font-size-14">11:40 AM</h5>
										</div>

										<div class="mt-4">
											<p class="text-muted mb-1">Location</p>
											<h5 class="font-size-14 mb-0">California, USA</h5>
										</div>
									</div>
								</div>
							</div>
							<!-- end profile card -->
							<div class="card shadow-none border mb-2">
								<a href="#profile-setting-privacycollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-privacycollapse">
									<div class="card-header" id="profile-setting-privacyheading">
										<h5 class="font-size-14 m-0">
											Privacy
											<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
										</h5>
									</div>
								</a>
								<div id="profile-setting-privacycollapse" class="collapse" aria-labelledby="profile-setting-privacyheading" data-parent="#profile-setting-accordion">
									<div class="card-body">
										<div class="py-3">
											<div class="media align-items-center">
												<div class="media-body overflow-hidden">
													<h5 class="font-size-13 mb-0 text-truncate">Profile photo</h5>

												</div>
												<div class="dropdown ml-2">
													<button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Everyone <i class="mdi mdi-chevron-down"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">Everyone</a>
														<a class="dropdown-item" href="#">selected</a>
														<a class="dropdown-item" href="#">Nobody</a>
													</div>
												</div>
											</div>
										</div>
										<div class="py-3 border-top">
											<div class="media align-items-center">
												<div class="media-body overflow-hidden">
													<h5 class="font-size-13 mb-0 text-truncate">Last seen</h5>

												</div>
												<div class="ml-2">
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" id="privacy-lastseenSwitch" checked>
														<label class="custom-control-label" for="privacy-lastseenSwitch"></label>
													</div>
												</div>
											</div>
										</div>

										<div class="py-3 border-top">
											<div class="media align-items-center">
												<div class="media-body overflow-hidden">
													<h5 class="font-size-13 mb-0 text-truncate">Status</h5>

												</div>
												<div class="dropdown ml-2">
													<button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Everyone <i class="mdi mdi-chevron-down"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">Everyone</a>
														<a class="dropdown-item" href="#">selected</a>
														<a class="dropdown-item" href="#">Nobody</a>
													</div>
												</div>
											</div>
										</div>

										<div class="py-3 border-top">
											<div class="media align-items-center">
												<div class="media-body overflow-hidden">
													<h5 class="font-size-13 mb-0 text-truncate">Read receipts</h5>

												</div>
												<div class="ml-2">
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" id="privacy-readreceiptSwitch" checked>
														<label class="custom-control-label" for="privacy-readreceiptSwitch"></label>
													</div>
												</div>
											</div>
										</div>

										<div class="py-3 border-top">
											<div class="media align-items-center">
												<div class="media-body overflow-hidden">
													<h5 class="font-size-13 mb-0 text-truncate">Groups</h5>

												</div>
												<div class="dropdown ml-2">
													<button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Everyone <i class="mdi mdi-chevron-down"></i>
													</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">Everyone</a>
														<a class="dropdown-item" href="#">selected</a>
														<a class="dropdown-item" href="#">Nobody</a>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<!-- end Privacy card -->

							<div class="card shadow-none border mb-2">
								<a href="#profile-setting-securitynoticollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-securitynoticollapse">
									<div class="card-header" id="profile-setting-securitynotiheading">
										<h5 class="font-size-14 m-0">
											Security
											<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
										</h5>
									</div>
								</a>
								<div id="profile-setting-securitynoticollapse" class="collapse" aria-labelledby="profile-setting-securitynotiheading" data-parent="#profile-setting-accordion">
									<div class="card-body">

										<div>
											<div class="media align-items-center">
												<div class="media-body overflow-hidden">
													<h5 class="font-size-13 mb-0 text-truncate">Show security notification</h5>

												</div>
												<div class="ml-2">
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" id="security-notificationswitch">
														<label class="custom-control-label" for="security-notificationswitch"></label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end Security card -->

							<div class="card shadow-none border mb-2">
								<a href="#profile-setting-helpcollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-helpcollapse">
									<div class="card-header" id="profile-setting-helpheading">
										<h5 class="font-size-14 m-0">
											Help
											<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
										</h5>
									</div>
								</a>
								<div id="profile-setting-helpcollapse" class="collapse" aria-labelledby="profile-setting-helpheading" data-parent="#profile-setting-accordion">
									<div class="card-body">

										<div>
											<div class="py-3">
												<h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">FAQs</a></h5>
											</div>
											<div class="py-3 border-top">
												<h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Contact</a></h5>
											</div>
											<div class="py-3 border-top">
												<h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Terms & Privacy policy</a></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end Help card -->
						</div>
						<!-- end profile-setting-accordion -->
					</div>
					<!-- End User profile description -->
				</div>
				<!-- Start Settings content -->
			</div>
			<!-- End settings tab-pane -->
		</div>
		<!-- end tab content -->

	</div>
	<!-- end chat-leftsidebar -->

	<!-- Start User chat -->
	<div class="user-chat w-100 overflow-hidden">
		<div class="d-lg-flex">

			<!-- start chat conversation section -->
			<div class="w-100 " id="framechat">

        </div>
			<!-- end chat conversation section -->

			<!-- start User profile detail sidebar -->
			<div class="user-profile-sidebar">
				<div class="px-3 px-lg-4 pt-3 pt-lg-4">
					<div class="user-chat-nav text-right">
						<button type="button" class="btn nav-btn" id="user-profile-hide">
							<i class="ri-close-line"></i>
						</button>
					</div>
				</div>

				<div class="text-center p-4 border-bottom">
					<div class="mb-4">
						<img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="">
					</div>

					<h5 class="font-size-16 mb-1 text-truncate">Doris Brown</h5>
					<p class="text-muted text-truncate mb-1"><i class="ri-record-circle-fill font-size-10 text-success mr-1"></i> Active</p>
				</div>
				<!-- End profile user -->

				<!-- Start user-profile-desc -->
				<div class="p-4 user-profile-desc" data-simplebar>
					<div class="text-muted">
						<p class="mb-4">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual.</p>
					</div>

					<div id="profile-user-accordion" class="custom-accordion">
						<div class="card shadow-none border mb-2">
							<a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
								<div class="card-header" id="headingOne">
									<h5 class="font-size-14 m-0">
										<i class="ri-user-2-line mr-2 align-middle d-inline-block"></i> About
										<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
									</h5>
								</div>
							</a>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#profile-user-accordion">
								<div class="card-body">

									<div>
										<p class="text-muted mb-1">Name</p>
										<h5 class="font-size-14">Doris Brown</h5>
									</div>

									<div class="mt-4">
										<p class="text-muted mb-1">Email</p>
										<h5 class="font-size-14">adc@123.com</h5>
									</div>

									<div class="mt-4">
										<p class="text-muted mb-1">Time</p>
										<h5 class="font-size-14">11:40 AM</h5>
									</div>

									<div class="mt-4">
										<p class="text-muted mb-1">Location</p>
										<h5 class="font-size-14 mb-0">California, USA</h5>
									</div>
								</div>
							</div>
						</div>
						<!-- End About card -->

						<div class="card mb-1 shadow-none border">
							<a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
								<div class="card-header" id="headingTwo">
									<h5 class="font-size-14 m-0">
										<i class="ri-attachment-line mr-2 align-middle d-inline-block"></i> Attached Files
										<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
									</h5>
								</div>
							</a>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#profile-user-accordion">
								<div class="card-body">
									<div class="card p-2 border mb-2">
										<div class="media align-items-center">
											<div class="avatar-sm mr-3">
												<div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
													<i class="ri-file-text-fill"></i>
												</div>
											</div>
											<div class="media-body">
												<div class="text-left">
													<h5 class="font-size-14 mb-1">admin_v1.0.zip</h5>
													<p class="text-muted font-size-13 mb-0">12.5 MB</p>
												</div>
											</div>

											<div class="ml-4">
												<ul class="list-inline mb-0 font-size-18">
													<li class="list-inline-item">
														<a href="#" class="text-muted px-1">
															<i class="ri-download-2-line"></i>
														</a>
													</li>
													<li class="list-inline-item dropdown">
														<a class="dropdown-toggle text-muted px-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ri-more-fill"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- end card -->

									<div class="card p-2 border mb-2">
										<div class="media align-items-center">
											<div class="avatar-sm mr-3">
												<div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
													<i class="ri-image-fill"></i>
												</div>
											</div>
											<div class="media-body">
												<div class="text-left">
													<h5 class="font-size-14 mb-1">Image-1.jpg</h5>
													<p class="text-muted font-size-13 mb-0">4.2 MB</p>
												</div>
											</div>

											<div class="ml-4">
												<ul class="list-inline mb-0 font-size-18">
													<li class="list-inline-item">
														<a href="#" class="text-muted px-1">
															<i class="ri-download-2-line"></i>
														</a>
													</li>
													<li class="list-inline-item dropdown">
														<a class="dropdown-toggle text-muted px-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ri-more-fill"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- end card -->

									<div class="card p-2 border mb-2">
										<div class="media align-items-center">
											<div class="avatar-sm mr-3">
												<div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
													<i class="ri-image-fill"></i>
												</div>
											</div>
											<div class="media-body">
												<div class="text-left">
													<h5 class="font-size-14 mb-1">Image-2.jpg</h5>
													<p class="text-muted font-size-13 mb-0">3.1 MB</p>
												</div>
											</div>

											<div class="ml-4">
												<ul class="list-inline mb-0 font-size-18">
													<li class="list-inline-item">
														<a href="#" class="text-muted px-1">
															<i class="ri-download-2-line"></i>
														</a>
													</li>
													<li class="list-inline-item dropdown">
														<a class="dropdown-toggle text-muted px-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ri-more-fill"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- end card -->

									<div class="card p-2 border mb-2">
										<div class="media align-items-center">
											<div class="avatar-sm mr-3">
												<div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
													<i class="ri-file-text-fill"></i>
												</div>
											</div>
											<div class="media-body">
												<div class="text-left">
													<h5 class="font-size-14 mb-1">Landing-A.zip</h5>
													<p class="text-muted font-size-13 mb-0">6.7 MB</p>
												</div>
											</div>

											<div class="ml-4">
												<ul class="list-inline mb-0 font-size-18">
													<li class="list-inline-item">
														<a href="#" class="text-muted px-1">
															<i class="ri-download-2-line"></i>
														</a>
													</li>
													<li class="list-inline-item dropdown">
														<a class="dropdown-toggle text-muted px-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ri-more-fill"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- end card -->

								</div>

							</div>
						</div>
						<!-- End Attached Files card -->
					</div>
					<!-- end profile-user-accordion -->
				</div>
				<!-- end user-profile-desc -->
			</div>
			<!-- end User profile detail sidebar -->
		</div>
	</div>
	<!-- End User chat -->

	<!-- audiocall Modal -->
	<div class="modal fade" id="audiocallModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="text-center p-4">
						<div class="avatar-lg mx-auto mb-4">
							<img src="assets/images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
						</div>

						<h5 class="text-truncate">Doris Brown</h5>
						<p class="text-muted">Start Audio Call</p>

						<div class="mt-5">
							<ul class="list-inline mb-1">
								<li class="list-inline-item px-2">
									<button type="button" class="btn btn-danger avatar-sm rounded-circle" data-dismiss="modal">
										<span class="avatar-title bg-transparent font-size-20">
											<i class="ri-close-fill"></i>
										</span>
									</button>
								</li>
								<li class="list-inline-item px-2">
									<button type="button" class="btn btn-success avatar-sm rounded-circle">
										<span class="avatar-title bg-transparent font-size-20">
											<i class="ri-phone-fill"></i>
										</span>
									</button>
								</li>
							</ul>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<!-- audiocall Modal -->

	<!-- videocall Modal -->
	<div class="modal fade" id="videocallModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="text-center p-4">
						<div class="avatar-lg mx-auto mb-4">
							<img src="assets/images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
						</div>

						<h5 class="text-truncate">Doris Brown</h5>
						<p class="text-muted mb-0">Start Video Call</p>

						<div class="mt-5">
							<ul class="list-inline mb-1">
								<li class="list-inline-item px-2">
									<button type="button" class="btn btn-danger avatar-sm rounded-circle" data-dismiss="modal">
										<span class="avatar-title bg-transparent font-size-20">
											<i class="ri-close-fill"></i>
										</span>
									</button>
								</li>
								<li class="list-inline-item px-2">
									<button type="button" class="btn btn-success avatar-sm rounded-circle">
										<span class="avatar-title bg-transparent font-size-20">
											<i class="ri-vidicon-fill"></i>
										</span>
									</button>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- end modal -->
</div>
<script src="/themes/assets/libs/jquery/jquery.min.js"></script>
	<script src="/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/themes/assets/libs/simplebar/simplebar.min.js"></script>
	<script src="/themes/assets/libs/node-waves/waves.min.js"></script>
	<script src="/themes/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="/themes/assets/libs/owl.carousel/owl.carousel.min.js"></script>
	<script src="/themes/assets/js/pages/index.init.js"></script>
	<script src="/themes/assets/js/app.js"></script>
	<script>
		function timestamp() {
			$.ajax({
				url: '/timestamp.php',
				success: function(data) {
					$('#timestamp').html(data);
				},
			});
		}
		$(function(){
			setInterval(timestamp, 200);
		});
	</script>
	<script>
		function loadchat(id,name){

			var varurl = window.location.protocol + "//" + location.hostname + "/cs/chatframe";
			$.ajax({
				type: 'post',
				url: varurl,
				data: {"id":id,"name":name},
				success: function (response) {
					$("#framechat").html(response);

				},
				error: function () {
					alert("response failed !!");
				}
			});
		}
	</script>
</body>
</html>