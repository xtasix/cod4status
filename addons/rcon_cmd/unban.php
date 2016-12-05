<?php
	

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	include ("../../header.php");

	include ("../../include/SourceQuery/bootstrap.php");
	
	use xPaw\SourceQuery\SourceQuery;

if(isset($_SESSION['steamid'])) {

	if (isset( $_POST['command'] )){

		//Get the right ban

		$db->where('id', $_POST['id']);
		$imgpath = $db->getOne ("banned_players");
		$getimg = $_POST['screenshot_url'];
		

		//Delete the screenshot
		
		unlink($getimg); 
	
		$db->where('id', $_POST['id']);
		if($db->delete('banned_players'))
		$_SESSION["delreport"] = 'Cheater Report deleted and player succesfully unbanned';


		//Get the servers to execute the command unban on them

		$servers = $db->get('my_servers');

		if ( !empty ( $servers ) ) {//show if not empty

			//Execute the rcon command on all listed servers

			foreach ( $servers as $server ) {

				sleep(2); // this should halt for 2 seconds for every loop

				$sq_server_addr = $servers[0]['server_ip'];
				$sq_server_port = $servers[0]['server_port'];
				$sq_server_rcon = $servers[0]['server_identkey'];
		
		
				$Query = new SourceQuery( );
				
				try
				{
					$Query->Connect( ''.$sq_server_addr.'', $sq_server_port );
					
					$Query->SetRconPassword( ''.$sq_server_rcon.'' );
					$Query->Rcon( ''.$_POST['command'].' '.$_POST['player'].'');
							
					$Query->Disconnect( );
				}
				catch( SQueryException $e )
				{
					$Query->Disconnect( );
					
					echo "Error: " . $e->getMessage( );
				}
			}
		};

	}
	header("location: ../../banned.php?server_id=".$_POST['server_id']);
}else{
	header("location: ../../banned.php?server_id=".$_POST['server_id']);
	exit('Not there Wenys');
}