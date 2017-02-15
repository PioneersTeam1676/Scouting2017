<?php
	require "tcpdf/tcpdf.php";
	include "connect.inc.php";

	$teams = array($_GET['r_t1']+0, $_GET['r_t2']+0, $_GET['r_t3']+0, $_GET['B_t1']+0, $_GET['B_t2']+0, $_GET['B_t2']+0);

	$pdf = new TCPDF('L','in',array(8.5,11));
	$pdf->setFontSubsetting(false);
	$pdf->SetPrintHeader(true);
	$pdf->SetPrintFooter(false);
	$pdf->Open('doc.pdf');
	$pdf->SetFont('Helvetica','B',7.5);	//Sets Label font to Helvetica/Helvetica, Bold, and Size(pt)
	$pdf->SetMargins(0.1, 0.1, 0.1);	//Margins of the label sheet
	$pdf->SetHeaderData('', 0, '', 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), array(0,0,0), array(0,0,0));
	$pdf->AddPage();

	foreach ($teams as $key){
		$teamQuery = "SELECT * FROM `matches` WHERE `teamNum`=$key";
		$teamQueryResult = $scouting_mysqli->query($teamQuery);
		if (!$teamQueryResult){
			echo "There was an error accessing the data...";
		}
		$pdf->Cell(1,.1,"Team : ".$key,0);
		$pdf->Ln();
		$pdf->Ln();

		$pdf->Cell(1,.1,"AUTON",0);
		$pdf->Ln();

		$pdf->Cell(1,.1,"Match Num",1,0);
		$pdf->Cell(1,.1,"Gear",1,0);
		$pdf->Cell(1,.1,"Shoot",1,0);
		$pdf->Cell(1,.1,"Move",1,0);
		$pdf->Ln();

		while ($row = $teamQueryResult->fetch_assoc()){
			{
				$dataID = $row['id'];
				$matchNum = $row['matchNum'];
				$crossBaseline = $row['crossBaseline'];
				$autoGear = $row['autoGear'];
				$autoShoot = $row['autoShoot'];
				$teleHopper = $row['teleHopper'];
				$teleAcquireBalls = $row['teleAcquireBallsType'];
				$teleAcquireGears = $row['teleAcquireGearsType'];
				$shootingBalls = $row['shootingBalls'];
				$shootingConsistency = $row['shootingConsistency'];
				$placeGear = $row['placeGear'];
				$numGearPlaced = $row['numGearPlaced'];
				$teleDefense = $row['teleDefense'];
				$locationOfHuman = $row['locationOfHuman'];
				$canClimb = $row['canClimb'];
				$lightsOn = $row['lightsOn'];
				$rotorsTurning = $row['rotorsTurning'];
			}

			$pdf->Cell(1,.1,$matchNum,1,0);
			$pdf->Cell(1,.1,$autoGear,1,0);
			$pdf->Cell(1,.1,$autoShoot,1,0);
			$pdf->Cell(1,.1,$crossBaseline,1,0);

			$pdf->Ln();
		}
		$pdf->Ln();

		$teamQuery2 = "SELECT * FROM `matches` WHERE `teamNum`=$key";
		$teamQuery2Result = $scouting_mysqli->query($teamQuery2);
		if (!$teamQuery2Result){
			echo "There was an error accessing the data...";
		}

		$pdf->Cell(1,.1,"TELEOP",0);
		$pdf->Ln();

		$pdf->Cell(1,.1,"Match Num",1,0);
		$pdf->Cell(1.5,.1,"Shooting Consistency",1,0);
		$pdf->Cell(1,.1,"Shooting Balls",1,0);
		$pdf->Cell(1,.1,"Gears Placed",1,0);
		$pdf->Cell(1,.1,"Climb",1,0);
		$pdf->Ln();

		while ($row = $teamQuery2Result->fetch_assoc()){
			{
				$dataID = $row['id'];
				$matchNum = $row['matchNum'];
				$crossBaseline = $row['crossBaseline'];
				$autoGear = $row['autoGear'];
				$autoShoot = $row['autoShoot'];
				$teleHopper = $row['teleHopper'];
				$teleAcquireBalls = $row['teleAcquireBallsType'];
				$teleAcquireGears = $row['teleAcquireGearsType'];
				$shootingBalls = $row['shootingBalls'];
				$shootingConsistency = $row['shootingConsistency'];
				$placeGear = $row['placeGear'];
				$numGearPlaced = $row['numGearPlaced'];
				$teleDefense = $row['teleDefense'];
				$locationOfHuman = $row['locationOfHuman'];
				$canClimb = $row['canClimb'];
				$lightsOn = $row['lightsOn'];
				$rotorsTurning = $row['rotorsTurning'];
			}

			$pdf->Cell(1,.1,$matchNum,1,0);
			$pdf->Cell(1.5,.1,$shootingConsistency,1,0);
			$pdf->Cell(1,.1,$shootingBalls,1,0);
			$pdf->Cell(1,.1,$numGearPlaced,1,0);
			$pdf->Cell(1,.1,$canClimb,1,0);

			$pdf->Ln();
		}
		$pdf->Ln();
	}

	$pdf->Output('example_001.pdf', 'I'); 
?>