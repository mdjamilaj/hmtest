<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url();?>images/pathshala_icon.png"/>

    <title> Library | IT Lab Solutions Ltd.</title>
	<meta name="robots" content="noindex, nofollow"/>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    
    <!-- ckeditor -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom_mine.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/select/select2.min.css" rel="stylesheet">
	
	<!-- Our Custom Css-->
    <link href="<?php echo base_url();?>assets/css/style_common.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/new_style.css" rel="stylesheet">
	
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nprogress.js"></script>

    

    <script>
        NProgress.start();
    </script>
	
	<!-------------- PRE LOADER -------------------->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/print/preloader.css"/> 
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/deb/modernizr.js"></script>
    
    
    <!-- time picker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    
	<script>
		//paste this code under head tag or in a seperate js file.
		// Wait for window load
		$(window).load(function(){
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");;
		});
	</script>
	<!-------------- END OF PRE LOADER -------------------->

	<script src="<?php echo base_url();?>assets/js/sweetalert/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert/sweetalert.css">
</head>

<body class="nav-md">
	<div class="se-pre-con"></div>
	
    <div class="container body">
        <div class="main_container">
			<!-- Load The Left Side Bar -->
            <?php $this->load->view('admin/include/admin_left_sidebar');?>
			<!-- Load The Left Side Bar -->

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

						<h1 class="organizationName"> WEBSITE MANAGEMENT SYSTEM </h1>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url();?>assets/images/img.jpg" alt=""><?php //echo $this->tank_auth->get_user_full_name();?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">3</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
												<img src="<?php echo base_url();?>assets/images/img.jpg" alt="Profile Image" />
											</span>
                                            <span>
												<span>Admin</span>
												<span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
												Demo Alert 01 ....
											</span>
                                        </a>
                                    </li>

									<li>
                                        <a>
                                            <span class="image">
												<img src="<?php echo base_url();?>assets/images/img.jpg" alt="Profile Image" />
											</span>
                                            <span>
												<span>Admin</span>
												<span class="time">5 mins ago</span>
                                            </span>
                                            <span class="message">
												Demo Alert 02 ....
											</span>
                                        </a>
                                    </li>
									
									
									<li>
                                        <a>
                                            <span class="image">
												<img src="<?php echo base_url();?>assets/images/img.jpg" alt="Profile Image" />
											</span>
                                            <span>
												<span>Admin</span>
												<span class="time">10 mins ago</span>
                                            </span>
                                            <span class="message">
												Demo Alert 03 ....
											</span>
                                        </a>
                                    </li>
									
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong><a href="#">See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

		<input type="hidden" id="get_all_common_info" value="<?php echo base_url();?>index.php/json/get_all_common_info">
	