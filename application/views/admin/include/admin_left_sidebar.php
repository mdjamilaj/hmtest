<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo base_url();	?>" class="site_title"> 
				<i class="fa fa-university" aria-hidden="true"></i> <span style='color: #000;'>Dashboard </span> 
			</a>
		</div>
		
		<div class="clearfix"></div>

		<!-- menu prile quick info -->
		<div class="profile" style='display: none;'>
			<div class="profile_pic">
				<img src="<?php echo base_url();?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?php //echo $this->tank_auth->get_user_full_name();?></h2>
			</div>
		</div>
		<!-- /menu prile quick info -->
		<br/>

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<!---  <h3 style="float:left; margin:10px 0; width:100%;">General Menu </h3>  ---->
				<ul class="nav side-menu">
					<li>
						<a><i class="fa fa-book"></i> Menu <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li> <a href="<?php echo  base_url() ?>/"> Home </a> </li>
							<li> <a href="<?php echo  base_url() ?>notice_index"> Notice </a> </li>
							<li> <a href="<?php echo  base_url() ?>notice_create"> Notice Create </a> </li>
							<li> <a href="<?php echo  base_url() ?>event_index"> Event </a> </li>
							<li> <a href="<?php echo  base_url() ?>event_create"> Event Create </a> </li>
							<li> <a href="#"> Menu 01 </a> </li>
							<li> <a href="#"> Menu 01 </a> </li>
							<li> <a href="#"> Menu 01 </a> </li>

							<li><a>Reports<span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li> <a href="<?php echo base_url();?>library/search_book">Search Book</a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
									<li> <a href="#"> Menu 01 </a> </li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a  data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a href="<?php echo base_url();?>auth/logout" data-toggle="tooltip" data-placement="top" title="Logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>