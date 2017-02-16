<?php
	include "connect.inc.php";

	$dataQuery = "SELECT * FROM `matches`";
	$dataResult = $scouting_mysqli->query($dataQuery);
	if (!$dataResult){
		echo "Error executing query: (" . $scouting_mysqli->errno . ") " . $scouting_mysqli->error;
	}else{
		echo "No problem";
	}
?>