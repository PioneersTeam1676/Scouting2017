<?php
	// Created by Turner Halligan
	// CR 2017
	include "connect.inc.php";
	session_start();
	
	if (!isset($_SESSION['uid'])){
		
		
		if (isset($_GET["login"]) || (!empty($_POST["login_username"]) && !empty($_POST["login_pass"]))){
			extract($_POST);

			$login_query = "SELECT * FROM users WHERE `username`='$login_username'";
			$result_users = $login_mysqli->query($login_query);
			if (!$result_users){
				echo "There was a problem running the query";
				echo $login_query;
			}

			$row = $result_users->fetch_assoc();
			
			$salt = $row['salt'];
			$checkPwd = crypt($login_pass,$salt);

			if ($checkPwd == $row['password']){
				echo 'Thanks! Please wait a moment for Brian to turn the gears of this website so that it works.';
				echo '<meta http-equiv="refresh" content="1" url="index.php" />';
				$_SESSION['uid'] = $row['uid'];
				$_SESSION['fName'] = $row['firstName'];
				$_SESSION['lName'] = $row['lastName'];
				$_SESSION['ACL'] = $row['ACL'];
				$_SESSION['user'] = $row['username'];
				$_SESSION['favColor'] = $row['favColor'];
			}
			
			
		}
		
		if (isset($_GET["register"]) || (!empty($_POST["regi_username"]) && !empty($_POST["regi_pass"]))){
			extract($_POST);

			$register_query = "SELECT * FROM users WHERE username = `$regi_username`";
			$result_users = $login_mysqli->query($register_query);

			if ($result_users->num_rows != 0){
				echo "<h1>Username already exists.  Please use another.</h1>";
			}
			else{
				$pwd = $regi_pass;
				$confirm = $regi_repass;
				$uName = $regi_username;
				$newTeamNum = $regi_teamnum;
				$color = $regi_favColor;

				$fName = addslashes($regi_fname);
				$lName = addslashes($regi_lname);

				$allowedChars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
				$charsLen = 63;
				$saltLength = 21;
				$salt = "";
				for($i=0; $i<$saltLength; $i++){
						$salt .= $allowedChars[mt_rand(0,$charsLen)];
				}
				$hashedPassword = crypt($pwd, $salt);

				if ($pwd == $confirm){
					if ($newTeamNum == 1676){
						$newUser_query = "INSERT INTO users (username, password, firstName, lastName, teamNum, favColor, salt, ACL) VALUES ('$uName', '$hashedPassword', '$fName', '$lName', '$newTeamNum', '$color', '$salt', '3')";
					}
					else{
						$newUser_query = "INSERT INTO users (username, password, firstName, lastName, teamNum, favColor, salt, ACL) VALUES ('$uName', '$hashedPassword', '$fName', '$lName', '$newTeamNum', '$color', '$salt', '5')";
					}
					$register_result = $login_mysqli->query($newUser_query);
					if(!$register_result){
						echo "There was an error when creating your account";
						echo $newUser_query;
					}

				}
			}
		}

?>

	<!doctype html>
	<html>
		<head>
		</head>

		<body>
			<div class="center_div">
			
			<form method="POST" action="index.php?login">
				<h1>Login</h1>
				<hr>
				<table>
					<tr>
						<td>Username: </td>
						<td><input required name="login_username" type="text"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input required name="login_pass" type="password"></td>
					</tr>
					<tr>
						<td>Competition: </td>
						<td>
							<select required name="login_comp">
								<option value="comp1">Competition 1</option>
								<option value="comp2">Competition 2</option>
								<option value="comp3">Competition 3</option>
								<option value="comp4">Competition 4</option>
								<option value="comp5">Competition 5</option>
							</select>
						</td>
					</tr>
				</table>
				<input type="submit" value="LOGIN">
				<hr>
			</form>

			<form method="POST" action="index.php?register">
				<h1>Create a New Account</h1>
				<hr>
				<table>
					<tr>
						<td>Username: </td>
						<td><input required name="regi_username" type="text"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input required name="regi_pass" type="password"></td>
					</tr>
					<tr>
						<td>Re-type Password: </td>
						<td><input required name="regi_repass" type="password"></td>
					</tr>
					<tr>
						<td>First Name: </td>
						<td><input required name="regi_fname" type="text"></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><input required name="regi_lname" type="text"></td>
					</tr>
					<tr>
						<td>Team Number: </td>
						<td><input required name="regi_teamnum" type="number"></td>
					</tr>
					<tr>
						<td>Favorite Color: </td>
						<td><input required name="regi_favColor" type="color" value="#FFCC00"></td>
					</tr>
				</table>
				<input type="submit" value="Create">
				<hr>
			</form>
			
			</div>
		</body>
	</html>

<?php
}else{
	if (isset($_GET["logout"])){
		$_SESSION = array();
		session_destroy();
		echo '<meta http-equiv="refresh" content="1" url="index.php" />';
		echo "Thank you for scouting today! Please wait a moment for Brian to turn the gears of this website so that it works.";
	}else{
		echo '<form method="POST" action="index.php?logout">
			<input type="submit" value="LOGOUT">
		</form>';
	}
?>

<!doctype HTML>
<html>
	<head>
		<title>Logout</title>
	</head>

	<body>
		
	</body>
</html>

<?php
}
?>