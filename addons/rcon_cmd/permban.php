<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include ("../../include/SourceQuery/bootstrap.php");
	include_once("../../header.php");

	use xPaw\SourceQuery\SourceQuery;

if(isset($_SESSION['steamid'])) {

	if (isset( $_POST['command'] )){

		//Get all servers
		$servers = $db->get('my_servers');

		if ( !empty ( $servers ) ) {//show if not empty

			//Move the image to banned players and create a cheater report
					
					rename ("../../".$_POST['screenshot_url'], "../../banned/".$_POST['screenshot_url']);
					
					$data = Array (
					    'player_name' => $_POST['player_name'],
					    'server_name' => $_POST['server_name'],
					    'map' => $_POST['map'],
					    'time' => $_POST['time'],
					    'guid' => $_POST['guid'],
					    'screenshot_url' => 'banned/'.$_POST['screenshot_url'].'',
					    'banned_by' => $_POST['banned_by'],
					    'admin_uid' => $_SESSION['steamid'],
					    'server_id' => $_POST["server_id"]
					);
					
					$id = $db->insert ('banned_players', $data);
					
					if($id)
					    $_SESSION["reportmsg"] = 'Cheater report created successfully with Id=' . $id;

			//Execute the rcon command on all listed servers

			foreach ( $servers as $server ) {

				if (!empty ($server['server_name']) ){

					sleep(2); // this should halt for 2 seconds for every loop
		
					$sq_server_addr = $server['server_ip'];
					$sq_server_port = $server['server_port'];
					$sq_server_rcon = $server['server_identkey'];
			
					$Query = new SourceQuery( );
					
					try
					{
						$Query->Connect( ''.$sq_server_addr.'', $sq_server_port );
						
						$Query->SetRconPassword( ''.$sq_server_rcon.'' );
						
						$Query->Rcon( ''.$_POST['command'].' '.$_POST['guid'].' '.$_POST['message'].' - permbanned by (^5'.$_POST['player_name'].'^7)');


			
						$Query->Disconnect( );
					}
					catch( SQueryException $e )
					{
						$Query->Disconnect( );
						
						echo "Error: " . $e->getMessage( );
					}
				}
			}

			$_SESSION["errormsg"] = ''.$_POST['player_name'].' sucessfully permbanned on all servers';
		};

	}

	header('location: ../../server-details.php?id='.$_POST['server_id'].'');

}else{
	
	header('location: ../../server-details.php?id='.$_POST['server_id'].'');
	exit('Not there Wenys');
}