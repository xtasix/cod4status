<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php the_title();?> | CoD4 Status</title>
	
		<!-- Bootstrap core CSS -->
		<link href="<?php home_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php home_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php home_url();?>assets/css/animate.min.css" rel="stylesheet">
		<link href="<?php home_url();?>assets/css/switchery/switchery.min.css" rel="stylesheet">

		<link href="<?php home_url();?>assets/css/ekko-lightbox.css" rel="stylesheet">
		<link href="<?php home_url();?>assets/css/dark.css" rel="stylesheet">
		
		<!-- Custom styling plus plugins -->
		<link href="<?php home_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
		<link href="<?php home_url();?>assets/css/custom.css" rel="stylesheet">
		<link href="<?php home_url();?>assets/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php home_url();?>assets/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php home_url();?>assets/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php home_url();?>assets/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php home_url();?>assets/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<script src="<?php home_url();?>assets/js/nprogress.js"></script>
		<script src="<?php home_url();?>assets/js/jquery.min.js"></script>
		<!--[if lt IE 9]>
				<script src="<?php home_url();?>assets/js/ie8-responsive-file-warning.js"></script>
		<![endif]-->
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title"> <a href="<?php home_url();?>" class="site_title"><i class="fa fa-line-chart"></i> <span>CoD4 Status</span></a> </div>
						<div class="clearfix"></div>
						<div class="profile">
							<?php if(!isset($_SESSION['steamid'])) {?>
								<div class="profile_pic"> <img src="<?php home_url();?>assets/images/admin.png<?php echo '?='.date('U').'';?>" alt="user" class="img-circle profile_img"> </div>
								<div class="profile_info"> <span>Welcome,</span><h2>Guest</h2>
							</div>
							<?php } else {
								include ('steamauth/userInfo.php');
								$steam_admin = $steamprofile['steamid'];
								$db->where ("steam_id", $steam_admin);
								$user = $db->getOne ("steam_admins");
								if ( empty ( $user ) ) {
									header('Location: ?logout');
								}else {

								}
								?>
								<div class="profile_pic"> <img src="<?php echo $user['steam_avatar'];echo '?='.date('U').''?>" alt="user" class="img-circle profile_img"> </div>
							<div class="profile_info"> <span>Welcome,</span><h2><?php echo $user['steam_user_personaname'];?></h2></div>
							<?php };?>
							
						</div>
						<br />
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<h3>General menu</h3>
								<ul class="nav side-menu">
									<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">
											<li><a href="<?php home_url();?>">Dashboard</a></li>
										</ul>
									</li>
									<li><a><i class="fa fa-desktop"></i> Servers <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">

											<?php
												$nav_servers = $db->get('my_servers');
												if ( !empty ( $nav_servers ) ) {//show if not empty
													foreach ( $nav_servers as $nav_server ) {
											?>

											<li><a href="<?php home_url();?>server-details.php?id=<?php echo $nav_server['id'];?>"><?php echo $nav_server['server_name'];?></a> </li>
											<?php } //loop end
											}//show if not empty end
											;?>
										</ul>
									</li>
									<li><a><i class="fa fa-hand-paper-o"></i> Banned Players <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">
											<?php
												$nav_bans = $db->get('my_servers');
												if ( !empty ( $nav_bans ) ) {//show if not empty
													foreach ( $nav_bans as $nav_ban ) {
											?>
											<li><a href="<?php home_url();?>banned.php?server_id=<?php echo $nav_ban['id'];?>"><?php echo $nav_ban['server_name'];?></a> </li>
											<?php } //loop end
											}//show if not empty end
											;?>
										</ul>
									</li>
								</ul>
							</div>

							<?php if ($login->hasPrivilege() == true) {?>
							<div class="menu_section">
								<h3>Administration</h3>
								<ul class="nav side-menu">
									<li><a><i class="fa fa-bug"></i> Server Settings <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu" style="display: none">
											<li><a href="<?php home_url();?>admin/my-servers.php">My Servers</a> </li>
											<li><a href="<?php home_url();?>admin/server-admins.php">Server Admins</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<?php };?>
							</div>
						<div class="sidebar-footer hidden-small">
							<?php if ($login->isUserLoggedIn() == false) {?>
								<a data-toggle="tooltip" data-placement="top" href="<?php home_url();?>admin/index.php" title="" data-original-title="Admin Login"><span class="fa fa-sign-in" aria-hidden="true"></span></a>
							<?php };?>
							<?php if ($login->isUserLoggedIn() == true) {?>
								<a data-toggle="tooltip" href="<?php home_url();?>?logout" data-placement="top" title="" data-original-title="Admin Logout"><span class="fa fa-sign-out" aria-hidden="true"></span></a>
							<?php };?>
							<a data-toggle="tooltip" data-placement="top" title="" data-original-title="CoD4 Status"><span class="fa fa-line-chart"></span></a>
							<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Powered by NeHo"><span class="fa fa-info-circle" aria-hidden="true"></span></a>							
							<a href="http://www.cirkus-serveri.com/category/11/cod4-status" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="CoD4 Status Page"><i class="fa fa-globe" aria-hidden="true"></i></a>
							
						</div>
					</div>
				</div>
				<div class="top_nav">
					<div class="nav_menu">
						<nav class="">
							<div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
							<ul class="nav navbar-nav navbar-right">
								<?php
									if(!isset($_SESSION['steamid'])) {
									    echo "<li class=''>";
									    loginbutton();
										echo "</li>";
										} else {
									    
						
									   	$db->where ('steam_id', $steam_admin);
										$st_admins = $db->get('steam_admins');
										$data = Array (
    											'steam_user_personaname' => clear_server_name($steamprofile['personaname']),
    											'steam_profile_url' => $steamprofile['profileurl'],
    											'steam_avatar' => $steamprofile['avatar']
											);
						
										$db->where ('steam_id', $steam_admin);

										if ($db->update ('steam_admins', $data))
										    $msg = 'Server updated';
										else
										    $msg = 'Update failed: ' . $db->getLastError();

										
										?>
										<li class="">
											<a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="<?php echo $user['steam_avatar'];echo '?='.date('U').''?>" alt=""><?php echo $user['steam_user_personaname'];?> <span class=" fa fa-angle-down"></span></a>
											<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
												<li><a href="<?php home_url();?>?logout"><i class="fa fa-sign-out pull-right"></i> Sign Out</a> </li>
											</ul>
										</li>'
										
								<?php };?>
							</ul>
						</nav>
				</div>
			</div>