<?php 
	include "connect.inc.php";


?>

<!doctype html>
<html>
	<head>
		<title>Scouting Login</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		<div class="center_div">
			<form method="POST" action="index.php?login">
				<h1>Login</h1>
				<hr>
				<table>
					<tr>
						<td>Username: </td>
						<td><input name="login_username" type="text"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input name="login_pass" type="password"></td>
					</tr>
					<tr>
						<td>Competition: </td>
						<td>
							<select name="login_comp">
								<option value="comp1">Competition 1</option>
								<option value="comp2">Competition 2</option>
								<option value="comp3">Competition 3</option>
								<option value="comp4">Competition 4</option>
								<option value="comp5">Competition 5</option>
							</select>
						</td>
					</tr>
				</table>
				<input type="submit" value="Login">
				<hr>
			</form>

			<form method="POST" action="index.php?register">
				<h1>Create a New Account</h1>
				<hr>
				<table>
					<tr>
						<td>Username: </td>
						<td><input name="regi_username" type="text"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input name="regi_pass" type="password"></td>
					</tr>
					<tr>
						<td>Re-type Password: </td>
						<td><input name="regi_repass" type="password"></td>
					</tr>
					<tr>
						<td>First Name: </td>
						<td><input name="regi_fname" type="text"></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><input name="regi_lname" type="text"></td>
					</tr>
					<tr>
						<td>Team Number: </td>
						<td><input name="regi_teamnum" type="number"></td>
					</tr>
				</table>
				<input type="submit" value="Create">
				<hr>
			</form>
		</div>
	</body>