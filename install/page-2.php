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
					<p>1. Create a new database for CoD4 Status in phpmyadmin</p>
					<p>2. In order to install CoD4 Status we need to create a new database manually</p>
					<p>3. After you downloaded the CoD4 Status script upload and extract it to your webservers root folder</p>
					<p>4. Navigate to classes->MysqliDb.php Change next lines with your connection data, and the screenshot sender identkey (ID_KEY)</p>
					<div class="panel panel-default">
						<div class="panel-body">
							define("DB_HOST", "localhost");<br />
							define("DB_NAME", "DATABASE_NAME");<br />
							define("DB_USER", "DATABASE_USER");<br />
							define("DB_PASS", "DATABASE_PASSWORD");<br />
							define('ABS_PATH', dirname(__FILE__) . '/');<br />
							define('ABS_URL', 'http://www.mywebsite.com/');<br />
							define('ID_KEY', 'Changeme');//Same identkey as you specify in server.cfg
						</div>
					</div>
					<p>5. Navigate to steamauth->SteamConfig.php Change next lines</p>
					<div class="panel panel-default">
						<div class="panel-body">
							$steamauth['apikey'] = "Your Steam WebAPI-Key found at http://steamcommunity.com/dev/apikey";<br />
							$steamauth['domainname'] = "The main URL of your website";<br />
							$steamauth['logoutpage'] = "The main URL of your website";<br />
							$steamauth['loginpage'] = "The main URL of your website"; 
						</div>
					</div>
					<p><a href="page-3.php" class="btn btn-primary pull-right">Next step</a></p>
			</div>			
		</div>
		<div class="divider-30 clearfix"></div>
	</div>
	<?php include("include_footer.php"); ?>
  </body>
</html>
