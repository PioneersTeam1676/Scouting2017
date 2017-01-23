<?php
	include "connect.inc.php";
	session_start();
	if ($_SESSION["ACL"] <= 3){
?>

<!doctype html>
<html>
	<head>
		<title>Scouting Main</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		<form>
			<h1>Scouting</h1>
			<hr>
			<!-- PRE MATCH FORM DATA -->
			<h3>Pre-Match</h3>
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
			<!-- END PRE MATCH FORM DATA -->
			<hr>
			<!-- AUTO MODE FORM DATA -->
			<h3>Autonomous</h3>
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
			<!-- END AUTO MODE FORM DATA -->
			<hr>
			<!-- TELE OP MODE FORM DATA -->
			<h3>Tele-op</h3>
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
			<!-- END TELE OP MODE FORM DATA -->
			<hr>
			<!-- END GAME FORM DATA-->
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
						<input type="number" name="endRotorEnd">
					</td>
				</tr>
			</table>
			<!-- END END GAME FORM DATA-->
			<hr>
			<!-- POST MATCH FORM DATA -->
			<h3>Post-Match</h3>
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
			<!-- END POST MATCH FORM DATA -->
			<input type="submit" value="Post Results">
		</form>
	</body>
</html>

<?php
	}
?>
