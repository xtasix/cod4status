<?php
$message = "";
$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
$message = $msg;
?>
<div><?php echo $message; ?></div>