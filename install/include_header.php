<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
	exit("Sorry, CoD4 Status does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
	// if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
	// (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
	require_once("../libraries/password_compatibility_library.php");
}
// load the login class
require_once("../classes/Login.php");
// create a login object
$login = new Login();

require_once ('../functions.php');
require_once ('../classes/MysqliDb.php');
;?>
<!-- Bootstrap core CSS -->
<link href="<?php home_url() ;?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php home_url() ;?>install/css/style.css" rel="stylesheet">
<link href="<?php home_url() ;?>assests/fonts/css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="<?php home_url() ;?>/assets/js/ie8-responsive-file-warning.js"></script>
<![endif]-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->