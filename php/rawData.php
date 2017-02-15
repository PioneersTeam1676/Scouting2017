<?php
	function echoTD($val){ echo "<td>{$val}</td>";}

	include "connect.inc.php";

	if ($_SESSION['ACL'] <= 5 && $_SESSION['ACL'] != 0 && $_SESSION['ACL'] != 3){
?>

<!doctype html>
<html>
	<head>
	
	</head>

	<body>

		<h1>Raw Data</h1>
		<hr>
		<div class="noOverflowDiv">
		<table id="rawDataTable" class="tablesorter">
			<thead>
				<tr>
					<th class="thSorted">Data ID</th>
					<th class="thSorted">Match Number</th>
					<th class="thSorted">Team Number</th>
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
				$dataQuery = "SELECT * FROM `matches`";
				$dataResult = $scouting_mysqli->query($dataQuery);
				if (!$dataResult){
					echo "Error executing retriving data: (" . $scouting_mysqli->errno . ") " . $scouting_mysqli->error;
				}
				
				while ($row = $dataResult->fetch_assoc()){
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

					echo "<td><a target='_blank' href='php/team.php?tn=".$teamNum."'>".$teamNum."</a></td>";

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



		<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/tablesorter-master/jquery.tablesorter.js"></script> 
			<script>
				$(document).ready(function() 
				    { 
				        $("#rawDataTable").tablesorter(); 
				    } 
				); 
			</script>
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>

<?php
	}else if ($_SESSION['ACL'] <= 5 && $_SESSION['ACL'] != 0){
?>

<!doctype html>
<html>
	<head>
	
	</head>

	<body>
		<p>We apologize but you have not done enough prayer's to Dean Kaimen today to access the raw data we have stored in our servers</p>
		

		<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>

<?php
	}
?>