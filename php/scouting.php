<?php
	include "connect.inc.php";

	$dataQuery = "SELECT * FROM `users`";
	$dataResult = $login_mysqli->query($dataQuery);
	if (!$dataResult){
		echo "Error executing query: (" . $login_mysqli->errno . ") " . $login_mysqli->error;
	}else{
		//echo "No problem";
	}


	if ($_SESSION['ACL'] <= 3 && $_SESSION['ACL'] != 0 && $_SESSION['ACL'] != 2){
		if (isset($_GET["new"])){
			extract($_POST);

			$teleAcquireBallsType = " ";
			$teleAcquireGearsType = " ";
			$u_id = $_SESSION['uid'];
			
			if (isset($acquire_balls_ground)){
				$teleAcquireBallsType .= "g.";
			}
			if (isset($acquire_balls_feeder)){
				$teleAcquireBallsType .= "f."; 
			}

			if (isset($acquire_gears_ground)){
				$teleAcquireGearsType .= "g.";
			}
			if (isset($acquire_gears_feeder)){
				$teleAcquireGearsType .= "f.";
			}
			
			echo $teleAcquireBallsType;
			echo $teleAcquireGearsType;

			$scoutingQuery = "INSERT INTO `matches` (`uid`,`matchNum`, `teamNum`, `alliance`, `crossBaseline`, `autoGear`, `autoShoot`, `teleHopper`, `teleAcquireBallsType`, `teleAcquireGearsType`, `shootingBalls`, `shootingConsistency`, `placeGear`, `numGearPlaced`, `teleDefense`, `locationOfHuman`, `canClimb`, `lightsOn`, `rotorsTurning`, `blueScore`, `redScore`) VALUES ($u_id,$matchNum,$teamNum,'$teamAlliance',$autoCrossBaseline,$autoGear,$autoShoot,$teleHopper,'$teleAcquireBallsType','$teleAcquireGearsType','$teleShootBalls','$teleShootBallsConsistency',$telePlaceGear,$teleGearNumPlaced,$teleDefense,'$teleLocationOfHuman',$endCanClimb,$endLights,$endRotor,$blueScore,$redScore)";
			
			$scoutingResult = $scouting_mysqli->query($scoutingQuery);
			if (!$scoutingResult){
				echo "There was error \n";
				echo $scoutingQuery;
				
			}
			
		}
?>

<!doctype html>
<html>
	<head>
	</head>

	<body>
		<form method="POST" action="index.php?new">
			<h1>Scouting</h1>
			<hr>
			<!-- PRE MATCH FORM DATA -->
			<blockquote>
			<h3>Pre-Match</h3>
			<blockquote>
			<table>
				<tr>
					<td>Match Num :</td>
					<td><input name="matchNum" type="number"></td>
				</tr>
				<tr>
					<td>Team Num :</td>
					<td><input name="teamNum" type="number"></td>
				</tr>
				<tr>
					<td>Alliance :</td>
					<td>
						<div class="styled_select">
							<select name="teamAlliance">
								<option value="blue" >Blue Alliance</option>
								<option value="red" >Red Alliance</option>
							</select>
						</div>
					</td>
				</tr>
			</table>
			</blockquote>
			</blockquote>
			<!-- END PRE MATCH FORM DATA -->
			<hr>
			<!-- AUTO MODE FORM DATA -->
			<blockquote>
			<h3>Autonomous</h3>
			<blockquote>
			<table>
				<tr>
					<td>Do they cross baseline?</td>
					<td>
						<select name="autoCrossBaseline">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Gear?</td>
					<td>
						<select name="autoGear">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Shoot?</td>
					<td>
						<select name="autoShoot">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
			</table>
			</blockquote>
			</blockquote>
			<!-- END AUTO MODE FORM DATA -->
			<hr>
			<!-- TELE OP MODE FORM DATA -->
			<blockquote>
			<h3>Tele-op</h3>
			<blockquote>
			<table>
				<tr>
					<td>Can do hopper :</td>
					<td>
						<select name="teleHopper">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Can get balls from : </td>
					<td>
							<input type="checkbox" name="acquire_balls_ground" value="ground">Ground
							<input type="checkbox" name="acquire_balls_feeder" value="feeder">Feeder Station
					</td>
				</tr>
				<tr>
						<td>Can get gears from :</td>
						<td>
								<input type="checkbox" name="acquire_gears_ground" value="ground">Ground
								<input type="checkbox" name="acquire_gears_feeder" value="feeder">Feeder station
						</td>
				</tr>
				<tr>
						<td>Shooting the balls :</td>
						<td>
								<input type="radio" name="teleShootBalls" value="high">High
								<input type="radio" name="teleShootBalls" value="low">Low
								<input type="radio" name="teleShootBalls" value="both">Both
								<input type="radio" name="teleShootBalls" value="neither">Neither
						</td>
				</tr>
				<tr>
						<td>Consistency of shots :</td>
						<td>
								<input type="radio" name="teleShootBallsConsistency" value="very">Very Consistent
								<input type="radio" name="teleShootBallsConsistency" value="consistent">Consistent
								<input type="radio" name="teleShootBallsConsistency" value="okay">Okay
								<input type="radio" name="teleShootBallsConsistency" value="missing">Missing shots
								<input type="radio" name="teleShootBallsConsistency" value="none">None go in
						</td>
				</tr>
				<tr>
					<td>Place gear?</td>
					<td>
						<select name="telePlaceGear">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Number of gears put on the peg :</td>
					<td>
						<input type="number" name="teleGearNumPlaced">
					</td>
				</tr>
				<tr>
					<td>Play defense?</td>
					<td>
						<select name="teleDefense">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Location of human player :</td>
					<td>
						<input type="radio" name="teleLocationOfHuman" value="feeder">Feeder
						<input type="radio" name="teleLocationOfHuman" value="pilot">Pilot
					</td>
				</tr>

			</table>
			</blockquote>
			</blockquote>
			<!-- END TELE OP MODE FORM DATA -->
			
			<!-- END GAME FORM DATA-->
			<blockquote>
			<blockquote>
			<table>
				<tr>
					<td>Can robot climb?</td>
					<td>
						<select name="endCanClimb">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Lights stay on after match ended?</td>
					<td>
						<select name="endLights">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Number of rotors turning at the end of the match :</td>
					<td>
						<input type="number" name="endRotor">
					</td>
				</tr>
			</table>
			</blockquote>
			</blockquote>
			<!-- END END GAME FORM DATA-->
			<hr>
			<!-- POST MATCH FORM DATA -->
			<blockquote>
			<h3>Post-Match</h3>
			<blockquote>
			<table>
				<tr>
					<td>Blue Score :</td>
					<td><input name="blueScore" type="number"></td>
				</tr>
				<tr>
					<td>Red Score :</td>
					<td><input name="redScore" type="number"></td>
				</tr>
			</table>
			</blockquote>
			</blockquote>
			<!-- END POST MATCH FORM DATA -->
			<input type="submit" value="POST RESULTS">
		</form>
	</body>
</html>

<?php
	}elseif ($_SESSION['ACL'] == 2){
		if (isset($_GET["superscout"])){
			extract($_POST);

			$superScoutQuery = "INSERT INTO `super_matches`(`matchNum`, `teamNum`, `alliance`, `description`, `rating`) VALUES ($matchNum,$teamNum,'$teamAlliance','$superText',$superRating)";
			$superScoutResult = $scouting_mysqli->query($superScoutQuery);
			if (!$superScoutResult){
				echo "There was a problem posting the data to the server inside of Larry's server room. Query: ".$superScoutQuery;
			}
		}

?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>Super Scouting</h1>
		<hr>
		<blockquote>
		<form method="POST" action="index.php?superscout">
			<table>
				<tr>
					<td>Match Num :</td>
					<td><input name="matchNum" type="number"></td>
				</tr>
				<tr>
					<td>Team Num :</td>
					<td><input name="teamNum" type="number"></td>
				</tr>
				<tr>
					<td>Alliance :</td>
					<td>
						<div class="styled_select">
							<select name="teamAlliance">
								<option value="blue" >Blue Alliance</option>
								<option value="red" >Red Alliance</option>
							</select>
						</div>
					</td>
				</tr>
			</table>
			<hr>
			<textarea placeholder="Enter relevant information about the robot here" rows="4" cols="107" name="superText"></textarea>
			Robot Rating(1-5) : <input type="number" max="5" min="1" name="superRating" value="3">
			<br>
			<br>
			<input type="submit" value="POST RESULTS">
			<br>
		</form>
		</blockquote>
	</body>
</html>

<?php
	}else{
		echo 'You are not permitted to submit data.';
	}
?>