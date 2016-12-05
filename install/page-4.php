<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}
// include the configs / constants for the database connection
require_once ('../classes/MysqliDb.php');
// load the registration class
require_once("../classes/Registration.php");
// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
$registration = new Registration();
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
			<div class="col-md-6 col-sm-10 col-xs-12">
					<div class="page-header"><h3>Create Admin User</h3></div>
					<?php
					if (isset($registration)) {
					    if ($registration->errors) {
					        foreach ($registration->errors as $error) {
					            echo '<div class="alert alert-danger">'.$error.'  <a href="page-4.php">Try aggain</a></div>';
					        }
					    }
					    if ($registration->messages) {
					        foreach ($registration->messages as $message) {
					            echo '<div class="alert alert-success">'.$message.'</div>
								<p><a href="page-5.php" class="btn btn-primary pull-right">Next step</a></p>';
					        }
					    }
					};?>
					<?php if(!isset($_POST['register'])){ ?>
					<form method="post" action="page-4.php" name="registerform">
							<div class="form-group">
								<label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
								<input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
							</div>
							<div class="form-group">
								<label for="login_input_email">User's email</label>
								<input id="login_input_email" class="form-control" type="email" name="user_email" required />
							</div>
							<div class="form-group">
								<label for="login_input_password_new">Password (min. 6 characters)</label>
								<input id="login_input_password_new" class="form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
							</div>
							<div class="form-group">
								<label for="login_input_password_repeat">Repeat password</label>
								<input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
							</div>
							<button name="register" class="btn btn-primary pull-right" type="submit">Create Account</button>
						  </form>
					<?php };?>
			</div>			
		</div>
		<div class="divider-30 clearfix"></div>
	</div>
	<?php include("include_footer.php"); ?>
  </body>
</html>
