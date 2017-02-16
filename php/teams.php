<?php
	include "connect.inc.php";

	if ($_SESSION['ACL'] <= 5 && $_SESSION['ACL'] != 0 && $_SESSION['ACL'] != 3){
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1> Teams </h1>
		<hr>
		<blockquote>
			<h2>Side By Side</h2>
			<hr>
			<form target="_blank" action="php/reports.php">
				<table>
					<tr>
						<td>RED ALLIANCE</td>
						<td>BLUE ALLIANCE</td>
					</tr>
					<tr>
						<td><input type="number" name="r_t1"></td>
						<td><input type="number" name="B_t1"></td>
					</tr>
					<tr>
						<td><input type="number" name="r_t2"></td>
						<td><input type="number" name="B_t2"></td>
					</tr>
					<tr>
						<td><input type="number" name="r_t3"></td>
						<td><input type="number" name="B_t3"></td>
					</tr>
				</table>

				<br>
				<input type="submit" value="VIEW TEAMS">
			</form> 
		</blockquote>
		<blockquote>
		<h2>Teams List</h2>
		<hr>
		<?php
			$teamsQuery = "SELECT DISTINCT `teamNum` FROM `matches`";
			$teamsResult = $scouting_mysqli->query($teamsQuery);
			if (!$teamsResult){
				echo "Error executing retriving data: (" . $scouting_mysqli->errno . ") " . $scouting_mysqli->error;
			}

			while ($row = $teamsResult->fetch_assoc()){
				//echo "<a target='_blank' href='php/team.php?tn=".$row['teamNum']."'>".$row['teamNum']."</a>";
				echo "<a target='_blank' href='php/team.php?tn=".$row['teamNum']."'>";
				echo "<input type='button' value='".$row['teamNum']."'>";
				echo "</a>";
				echo "<br>";
			}
		?>
		</blockquote>
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