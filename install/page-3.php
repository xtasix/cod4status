<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once ('../classes/MysqliDb.php');

$hostname_db_conx = DB_HOST;
$database_db_conx = DB_NAME;
$username_db_conx = DB_USER;
$password_db_conx = DB_PASS;

$db_conx = mysqli_connect($hostname_db_conx, $username_db_conx, $password_db_conx, $database_db_conx);

// Evaluate the connection
					if (mysqli_connect_errno()) {
					    echo mysqli_connect_error();
					    exit();
					} else {
						$db_result = '<div class="alert alert-success"><strong>Success!</strong> Successfuly connected to the database!</div>';
						mysqli_set_charset($db_conx,"utf8");
						
					}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CoD4 Status - Installation</title>
	<?php include_once("include_header.php");?>
  </head>
  <body>
	  <div class="container" role="main">
	  	<div class="row">
        	<div class="col-md-10 col-sm-12 col-xs-12">
					<h1>CoD4 Status <small>It's free and always will be</small></h1>
					<hr class="colorgraph">
      		</div>
      	</div>
      	<div class="row">	
			<div class="col-md-10 col-sm-12 col-xs-12">
					<div class="page-header"><h3>Install and activate CoD4 Status</h3></div>
					
					<p>1. Checking if database is configured correctly</p>
					

					<?php echo $db_result;?>
						
					<div class="page-header"><h4>Creating the database tables</h4></div>
					<?php
						//--------------- CREATE THE USERS TABLE ---------------//
						$tbl_users = "CREATE TABLE IF NOT EXISTS users (
									  user_id INT(11) NOT NULL AUTO_INCREMENT,
									  user_name VARCHAR(16) NOT NULL,
									  user_password_hash VARCHAR(255) NOT NULL,
									  user_email VARCHAR(255) NOT NULL,
									  admin_uid VARCHAR(255) NULL,
									  steam_profile_url VARCHAR(255) NULL,
									  role VARCHAR(255) NOT NULL DEFAULT '100',
									  PRIMARY KEY (user_id),
									  UNIQUE KEY user_name (user_name,user_email)
									 )";
						$query = mysqli_query($db_conx, $tbl_users);
							if ($query === TRUE) {
								echo '<p class="green">
										<strong><i class="fa fa-check-circle-o"></i></strong> Administrators table successfully created!
										</p>'; 
							} else {
								echo '<p class="red">
										<strong>Error!</strong> Administrators table not created!
									</p>'; 
							}
						//--------------- CREATE THE BANNED PLAYERS TABLE ---------------//
						$tbl_banned_players = "CREATE TABLE IF NOT EXISTS banned_players ( 
										id INT(11) NOT NULL AUTO_INCREMENT,
										player_name VARCHAR(255) NULL,
										time VARCHAR(255) NULL,
										map VARCHAR(255) NULL,
										guid VARCHAR(255) NULL,
										banned_by VARCHAR(255) NULL,
										admin_uid VARCHAR(255) NULL,
										screenshot_url VARCHAR(255) NULL,
										server_name VARCHAR(255) NULL,
										server_id INT(11) NULL,		
										PRIMARY KEY (id),
										UNIQUE KEY player_name (screenshot_url) 
										)"; 
						$query = mysqli_query($db_conx, $tbl_banned_players); 
							if ($query === TRUE) {
								echo '<p class="green">
											<strong><i class="fa fa-check-circle-o"></i></strong> Banned players table successfully created!
										</p>'; 
							} else {
								echo '<p class="red">
											<strong>Error!</strong> Banned players table not created!
										</p>'; 
							}
						//--------------- CREATE THE SERVERS TABLE ---------------//
						$tbl_my_servers = "CREATE TABLE IF NOT EXISTS my_servers ( 
										id INT(11) NOT NULL AUTO_INCREMENT,
										server_name VARCHAR(255) NOT NULL,
										server_ip VARCHAR(255) NOT NULL,
										server_port INT(11) NOT NULL,
										server_maxplayers INT(11) NULL,
										server_online_players INT(11) NULL,
										server_game VARCHAR(255) NOT NULL DEFAULT 'Call of Duty 4 Server',
										server_current_map VARCHAR(255) NULL,
										server_location VARCHAR(255) NULL,
										last_refresh DATETIME NULL,
										steam_group_url VARCHAR(255) NULL,
										server_identkey VARCHAR(255) NULL,
										server_status VARCHAR(2) NULL,
										PRIMARY KEY (id)
										)"; 
						$query = mysqli_query($db_conx, $tbl_my_servers); 
							if ($query === TRUE) {
								echo '<p class="green">
											<strong><i class="fa fa-check-circle-o"></i></strong> Servers table successfully created!
										</p>'; 
							} else {
								echo '<p class="red">
											<strong>Error!</strong> Servers table not created!
										</p>'; 
							}
							//--------------- CREATE THE STEAM ADMINS TABLE ---------------//
						$tbl_steam_admins = "CREATE TABLE IF NOT EXISTS steam_admins ( 
										id INT(11) NOT NULL AUTO_INCREMENT,
										steam_id VARCHAR(255) NOT NULL,
										server_id INT(11) NOT NULL,
										role INT(11) NOT NULL DEFAULT '1',
										steam_user_personaname VARCHAR(255) NULL,
										steam_avatar VARCHAR(255) NULL,
										steam_profile_url VARCHAR(255) NULL,
										PRIMARY KEY (id)
										)"; 
						$query = mysqli_query($db_conx, $tbl_steam_admins); 
							if ($query === TRUE) {
								echo '<p class="green">
											<strong><i class="fa fa-check-circle-o"></i></strong> Steam Admins table successfully created!
										</p>'; 
							} else {
								echo '<p class="red">
											<strong>Error!</strong> Steam Admins table not created!
										</p>'; 
							}
				?>
				<p><a href="page-4.php" class="btn btn-primary pull-right" type="submit">Next step</a></p>
				<div class="clearfix"></div>
			</div>			
		</div>
		<div class="divider-30 clearfix"></div>
	</div>
	<?php include("include_footer.php"); ?>
  </body>
</html>
