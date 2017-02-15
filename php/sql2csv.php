<?php

	function sql2csv($select){
		include "connect.inc.php";
		
		$result = $scouting_mysqli->query($select);
		if (!$result) die('Couldn\'t fetch records');
		

	}
?>