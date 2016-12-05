<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include ("../../include/SourceQuery/bootstrap.php");
	include_once("../../header.php");

	use xPaw\SourceQuery\SourceQuery;

if(isset($_SESSION['steamid'])) {

	if (isset( $_POST['command'] )){

		//Get the right server

		$db->where ('id', $_POST['server_id']);
		$servers = $db->get('my_servers');

		if ($servers[0]['server_name']=='')header('location: ../../server-details.php?id='.$_POST['server_id'].'');

		$sq_server_addr = $servers[0]['server_ip'];
		$sq_server_port = $servers[0]['server_port'];
		$sq_server_rcon = $servers[0]['server_identkey'];


		$Query = new SourceQuery( );
		
		try
		{
			$Query->Connect( ''.$sq_server_addr.'', $sq_server_port );
			
			$Query->SetRconPassword( ''.$sq_server_rcon.'' );
			
			$_SESSION["errormsg"] = $Query->Rcon( ''.$_POST['command'].' '.$_POST['player'].' '.$_POST['tempban_time'].' '.$_POST['message'].' - tempbanned by (^5'.$_POST['player_name'].'^7)');

			$Query->Disconnect( );
		}
		catch( SQueryException $e )
		{
			$Query->Disconnect( );
			
			echo "Error: " . $e->getMessage( );
		}

	}

	header('location: ../../server-details.php?id='.$_POST['server_id'].'');

}else{
	
	header('location: ../../server-details.php?id='.$_POST['server_id'].'');
	exit('Not there Wenys');
}