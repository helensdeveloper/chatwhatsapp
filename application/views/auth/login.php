<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Login - <?php echo APPS_NAME?></title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('themes/admin/assets/css/authentication/form-1.css')?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('themes/admin/assets/css/forms/theme-checkbox-radio.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('themes/admin/assets/css/forms/switches.css')?>">
</head>
<body class="form">
	<div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                    	<h1 class="">Log In to <a href="<?=base_url('')?>"><span class="brand-name"><?php echo APPS_NAME ?></span></a></h1><br><br>
                    	<?php echo $this->session->flashdata('msg'); ?>
                        <form class="text-left" autocomplete="off" action="<?=base_url('login/method')?>" method="POST">
                            <div class="form">
                            	<div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                        </form>                        
                        <p class="terms-conditions">© 2020 All Rights Reserved. <a href="https://helensdeveloper.com">Helens Developer</a> is a product of Developer. <a href="https://helensdeveloper.com">Helens Developer</a>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

    <script src="<?=base_url('themes/admin/assets/js/libs/jquery-3.1.1.min.js')?>"></script>
    <script src="<?=base_url('themes/admin/bootstrap/js/popper.min.js')?>"></script>
    <script src="<?=base_url('themes/admin/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('themes/admin/assets/js/authentication/form-1.js')?>"></script>

</body>
</html>