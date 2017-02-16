<?php
	include "connect.inc.php";
	function echoTD($val){ echo "<td>{$val}</td>";}

	//if ($_SESSION['ACL'] <= 1 && $_SESSION['ACL'] != 0){
		if (isset($_GET['tn'])){

			$teamNum = $_GET['tn'];

			$teamQuery = "SELECT * FROM `matches` WHERE `teamNum`=$teamNum";
			$teamQueryResult = $scouting_mysqli->query($teamQuery);
			if (!$teamQueryResult){
				echo "There was an error accessing the data from Petars hair...";
			}

			if (isset($_GET['csv'])){
				$num_fields = mysqli_num_fields($teamQueryResult);
				$headers = array();
				while ($fieldinfo = mysqli_fetch_field($teamQueryResult)) {
				    $headers[] = $fieldinfo->name;
				}
				$fp = fopen('php://output', 'w');
				if ($fp && $teamQueryResult) {
				    header('Content-Type: text/csv');
				    header('Content-Disposition: attachment; filename="export.csv"');
				    header('Pragma: no-cache');
				    header('Expires: 0');
				    fputcsv($fp, $headers);
				    while ($row = $teamQueryResult->fetch_array(MYSQLI_NUM)) {
				        fputcsv($fp, array_values($row));
				    }
				    die;
				}
			}



?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Team 1676 Scouting</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<style>
				body{
					background-image: url("../img/bg.jpg");
				}
			</style>
		</head>
		<body>
			<div class="wrapper">
				<div class="main">
					<?php
						echo "<h1>Team {$teamNum}'s Scout Page</h1>";
						echo "<form method='POST' action='team.php?tn={$teamNum}&csv'>"

					?>
							<input type="submit" value="Get data in CSV">
						</form>
					<hr>

					<table id="rawDataTable" class="tablesorter">
					<thead>
						<tr>
							<th class="thSorted">Data ID</th>
							<th class="thSorted">Match Number</th>
							<th class="thSorted">Alliance</th>
							<th class="thSorted">Cross Baseline</th>
							<th class="thSorted">Auto Gear</th>
							<th class="thSorted">Auto Shoot</th>
							<th class="thSorted">Tele Hopper</th>
							<th class="thSorted">Tele Acquire Balls</th>
							<th class="thSorted">Tele Acquire Gears</th>
							<th class="thSorted">Shooting Ball</th>
							<th class="thSorted">Shooting Consistency</th>
							<th class="thSorted">Place Gear</th>
							<th class="thSorted">Number of Gears</th>
							<th class="thSorted">Defense</th>
							<th class="thSorted">Location of Human</th>
							<th class="thSorted">Can Climb</th>
							<th class="thSorted">Light On</th>
							<th class="thSorted">Rotors Turning</th>
						</tr>
					</thead>
					<?php
						while ($row = $teamQueryResult->fetch_assoc()){
							echo "<tr>";
							$dataID = $row['id'];
							$matchNum = $row['matchNum'];
							$teamNum = $row['teamNum'];
							$alliance = $row['alliance'];
							$crossBaseline = $row['crossBaseline'];
							$autoGear = $row['autoGear'];
							$autoShoot = $row['autoShoot'];
							$teleHopper = $row['teleHopper'];
							$teleAcquireBalls = $row['teleAcquireBallsType'];
							$teleAcquireGears = $row['teleAcquireGearsType'];
							$shootingBalls = $row['shootingBalls'];
							$shootingConsistency = $row['shootingConsistency'];
							$placeGear = $row['placeGear'];
							$numGearPlaced = $row['numGearPlaced'];
							$teleDefense = $row['teleDefense'];
							$locationOfHuman = $row['locationOfHuman'];
							$canClimb = $row['canClimb'];
							$lightsOn = $row['lightsOn'];
							$rotorsTurning = $row['rotorsTurning'];

							

							echoTD($dataID);
							echoTD($matchNum);

							
							echoTD($alliance);
							echoTD($crossBaseline);
							echoTD($autoGear);
							echoTD($autoShoot);
							echoTD($teleHopper);
							echoTD($teleAcquireBalls);
							echoTD($teleAcquireGears);
							echoTD($shootingBalls);
							echoTD($shootingConsistency);
							echoTD($placeGear);
							echoTD($numGearPlaced);
							echoTD($teleDefense);
							echoTD($locationOfHuman);
							echoTD($canClimb);
							echoTD($lightsOn);
							echoTD($rotorsTurning);
							
							echo "</tr>";
						}
					?>
					</table>
				</div>
			</div>
			<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="../js/tablesorter-master/jquery.tablesorter.js"></script> 
			<script>
				$(document).ready(function() 
				    { 
				        $("#rawDataTable").tablesorter(); 
				    } 
				); 
			</script>
		<!-- END OF JAVASCRIPT INCLUDES -->
		</body>
	</html>>

<?php
		}
	//}
?> 