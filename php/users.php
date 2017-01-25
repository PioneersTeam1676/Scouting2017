<?php
	include "connect.inc.php";


	if (isset($_SESSION["ACl"])){
		if ($_SESSION["ACL"] <= 0){
?>

<!doctype html>
<html>
	<head>
		<title>Users</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		<h1>Users</h1>
		<hr>
		<table id="mainTable" class="tablesorter">
			<thead>
				<tr>
					<td>Match Number</td>
					<td>Team Number</td>
				</tr>
			</thead>
			<tr>
				<td>1</td>
				<td>1676</td>
			</tr>
			<tr>
				<td>1</td>
				<td>1677</td>
			</tr>
			<tr>
				<td>1</td>
				<td>1678</td>
			</tr>

			<tr>
				<td>1</td>
				<td>203</td>
			</tr>
		</table>

		<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="../js/__jquery.tablesorter/jquery.tablesorter.js"></script> 

			<script>
				$(document).ready(function(){ 
				    $("#mainTable").tablesorter(); 
				}); 
			</script>>
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>


<?php 
		}else if(isset($_SESSION["uid"])){
?>
<!doctype html>
<html>
	<head>
		<title>Users</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		<h1>Your Account</h1>

		

		<!-- JAVASCRIPT INCLUDES -->
			<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script> 
			<script type="text/javascript" src="../js/__jquery.tablesorter/jquery.tablesorter.js"></script> 

			<script>
				$(document).ready(function(){ 
				    $("#mainTable").tablesorter(); 
				}); 
			</script>>
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>

<?php
		}
	}
?>