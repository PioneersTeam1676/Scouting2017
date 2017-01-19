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
					<td><input type="number"></td>
				</tr>
				<tr>
					<td>Team Num :</td>
					<td><input type="number"></td>
				</tr>
				<tr>
					<td>Alliance :</td>
					<td>
						<div class="styled_select">
							<select>
								<option>Blue Alliance</option>
								<option>Red Alliance</option>
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
					<td>Number of Brian's Obtained :</td>
					<td><input type="number"></td>
				</tr>
				<tr>
					<td>Number of Brian's Put in the Hole :</td>
					<td><input type="number"></td>
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
					    <input type="radio" name="hopper">Yes
					    <input type="radio" name="hopper">No
					</td>
				</tr>
				<tr>
					<td>Can get balls from : </td>
					<td>
					    <input type="checkbox" name="acquire_balls" value="ground">Ground
					    <input type="checkbox" name="acquire_balls" value="feeder">Feeder Station
					</td>
				</tr>
				<tr>
				    <td>Can get gears from :</td>
				    <td>
				        <input type="checkbox" name="acquire_gears" value="ground">Ground
				        <input type="checkbox" name="acquire_gears" value="feeder">Feeder station
				    </td>
				</tr>
				<tr>
				    <td>Shooting the balls :</td>
				    <td>
				        <input type="radio" name="shooting" value="high">High
				        <input type="radio" name="shooting" value="low">Low
				        <input type="radio" name="shooting" value="both">Both
				        <input type="radio" name="shooting" value="neither">Neither
				    </td>
				</tr>
				<tr>
				    <td>Consistency of shots :</td>
				    <td>
				        <input type="radio" name="consistency" value="very">Very Consistent
				        <input type="radio" name="consistency" value="consistent">Consistent
				        <input type="radio" name="consistency" value="okay">Okay
				        <input type="radio" name="consistency" value="missing">Missing shots
				        <input type="radio" name="consistency" value="none"
				    </td>
				</tr>
			</table>
			<!-- END TELE OP MODE FORM DATA -->
			<hr>
			<!-- POST MATCH FORM DATA -->
			<h3>Post-Match</h3>
			<table>
				<tr>
					<td>Blue Score :</td>
					<td><input type="number"></td>
				</tr>
				<tr>
					<td>Red Score :</td>
					<td><input type="number"></td>
				</tr>
			</table>
			<!-- END POST MATCH FORM DATA -->
			<input type="submit" value="Post Results">
		</form>
	</body>
</html>