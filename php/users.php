<?php
	include "connect.inc.php";

	if ($_SESSION['ACL'] <= 1 && $_SESSION['ACL'] != 0){
?>

<!doctype html>
<html>
	<head>
	
	</head>

	<body>
		<h1>Users</h1>
		<hr>
		<table id="usersTable" class="tablesorter">
			<thead>
				<tr>
					<th class="thSorted">User ID</th>
					<th class="thSorted">Team Number</th>
					<th class="thSorted">First Name</th>
					<th class="thSorted">Last Name</th>
					<th class="thSorted">ACL</th>
				</tr>
			</thead>
			<?php
				$users_query = "SELECT * FROM `users`";
				$result_users = $login_mysqli->query($users_query);
				
				if (!$result_users){
					echo "There was an error when fetching the account's from Brian's bedroom";
				}
				
				
				while ($row = $result_users->fetch_assoc()){
					echo '<tr>';
					$uid = $row['uid'];
					$teamNum = $row['teamNum'];
					$fName = $row['firstName'];
					$lName = $row['lastName'];
					$acl = $row['ACL'];
					
				
					echo '<td class="tdSorted">'. $uid .'</td>';
					echo '<td class="tdSorted">'. $teamNum .'</td>';
					echo '<td class="tdSorted">'. $fName .'</td>';
					echo '<td class="tdSorted">'. $lName .'</td>';
					echo '<td class="tdSorted">'. $acl .'</td>';
					echo '</tr>';
				}
				
			?>
		</table>

		<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="js/tablesorter-master/jquery.tablesorter.js"></script> 
			<script>
				$(document).ready(function() 
				    { 
				        $("#usersTable").tablesorter(); 
				    } 
				); 
			</script>
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>

<?php
	}else if ($_SESSION['ACL'] <= 5 && $_SESSION['ACL'] != 0){
		if (isset($_GET['updateAccount'])){
			extract($_POST);

			$u_id2 = $_SESSION['uid'];

			$updatePersonalAccountQuery = "UPDATE `users` SET `firstName`='$user_firstName',`lastName`='$user_lastName',`favColor`='$user_favColor' WHERE `uid`=$u_id2";
			$updatePersonalAccountResult = $login_mysqli->query($updatePersonalAccountQuery);
			if (!$updatePersonalAccountResult){
				echo "There was an error updating your account ";
				echo $updatePersonalAccountQuery;
			}else{
				$_SESSION['favColor'] = $user_favColor;
			}

		}
?>

<!doctype html>
<html>
	<head>
	
	</head>

	<body>
		<h1>Your Account</h1>
		<hr>
		<table id="usersTable" class="tablesorter">
			<thead>
				<tr>
					<th class="thSorted">Team Number</th>
					<th class="thSorted">First Name</th>
					<th class="thSorted">Last Name</th>
					<th class="thSorted">Favorite Color</th>
				</tr>
			</thead>
			<?php
				$u_id = $_SESSION['uid'];
				$user_query = "SELECT * FROM `users` WHERE `uid`=$u_id";
				$result_user = $login_mysqli->query($user_query);
				
				if (!$result_user){
					echo "There was an error when fetching the account from Larry's bedroom. Please send this to Larry(or Turner) so we can address this problem quickly.".$user_query;
				}
				
				echo '<tr>';
				while ($row = $result_user->fetch_assoc()){
					
					$teamNum = $row['teamNum'];
					$fName = $row['firstName'];
					$lName = $row['lastName'];
					$favColor = $row['favColor'];
					
					echo '<form method="POST" action="index.php?updateAccount">';
					echo '<td class="tdSorted">'. $teamNum .'</td>';
					echo '<td class="tdSorted"><input name="user_firstName" type="text" style="width:auto;" value="'. $fName .'"/></td>';
					echo '<td class="tdSorted"><input name="user_lastName" type="text" style="width:auto;" value="'. $lName .'"/></td>';
					echo '<td class="tdSorted"><input name="user_favColor" type="color" style="width:150px;" value="'. $favColor .'"/></td>';
					echo '</tr><tr><td class="tdSorted"><input type="submit" style="width:auto;" value="UPDATE ACCOUNT"/></td>';
					echo '</form>';
				}
				
				echo '</tr>'; 
			?>
		</table>

		<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>

<?php
	}
?>