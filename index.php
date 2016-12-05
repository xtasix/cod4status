<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once("header.php");
$servers = $db->get('my_servers');

$db->orderBy("id","desc");
$b_players = $db->get('banned_players', 5);
$title="Cirkus Serveri";
include_once("navigation.php");
?>
	<div class="right_col" role="main">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>COD4 Servers</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
								<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<table class="table table-striped projects">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th>Server Name</th>
										<th>Join</th>
										<th>Players</th>
										<th>Server Ip:Port</th>
										<th>Current Map</th>
									</tr>
								</thead>
								<tbody>
									<?php	
									if ( !empty ( $servers ) ) {//show if not empty
										foreach ( $servers as $server ) {?>
											<tr>
												<td><img src="<?php home_url();?>assets/images/flags/<?php echo $server['server_location'];?>.png"></td>
												<td><a href="<?php home_url();?>server-details.php?id=<?php echo $server['id'];?>"><?php echo $server['server_name'];?></a> <br />
													<small><?php echo $server['server_game'];?></small></td>
												<td><a href="cod4://<?php echo $server['server_ip'];?>:<?php echo $server['server_port'];?>" data-toggle="tooltip" title="Join via COD4x - COD4x Client required"><img src="<?php home_url();?>assets/images/cod4.gif" alt="cod4" class="avatar"></a></td>
												<td class="project_progress"><div class="progress progress_sm">
														<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php $get_percent = calculate_total($server['server_online_players'], $server['server_maxplayers']); echo $get_percent;?>"></div>
													</div>
													<small><?php echo $server['server_online_players'];?>/<?php echo $server['server_maxplayers'];?></small></td>
												<td><?php echo $server['server_ip'];?>:<?php echo $server['server_port'];?></td>
												<td><?php echo friendly_mapname($server['server_current_map']);?></td>
											</tr>
									<?php }};?>
								</tbody> 
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Banned players <small>recently</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
								<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
						<?php if ( !empty ( $b_players ) ) {//show if not empty ?>
							<ul class="list-unstyled top_profiles scroll-view">	
								<?php foreach ($b_players as $bplayer){ ?>
									<li class="media event">
										<div class="block">
											<div class="block_content">
												<a href="<?php home_url()?>banned.php?server_id=<?php echo $bplayer['server_id'];?>" class="pull-left border-aero profile_thumb"><i class="fa fa-user aero"></i></a>
												<div class="media-body">
                            						<a class="title" href="<?php home_url()?>banned.php?server_id=<?php echo $bplayer['server_id'];?>"><?php echo $bplayer['player_name'];?></a>
                            						<p>banned by <strong><?php echo $bplayer['banned_by'];?></strong></p>
                            						<p> <small><?php echo $bplayer['map'];?>, <?php echo $bplayer['time'];?></small>
                            						</p>
                            					</div>
											</div>
										</div>
									</li>
								 <?php }; ?>
							</ul>
						<?php 	}; ?>
						</div>
					</div>
				</div>				
<?php include("footer.php"); ?>
