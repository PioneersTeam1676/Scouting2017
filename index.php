<?php
	include "php/connect.inc.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Team 1676 Scouting</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body style="background: url('img/bg.jpg') 50% 0px / cover no-repeat fixed;">
		<div class="wrapper">
			<div class="main">
				<!-- Menu and buttons -->

				<div class="menu_title">
					<h1>Team 1676 Scouting</h1>
				</div>
				
				<div class="menu">
					<span class="menu_button" id="menu_button_login" onclick="changePage(0);">
						<b>LOGIN / LOGOUT</b>
					</span>

					<div class="menu_button" id="menu_button_blog" onclick="changePage(1);">
						<b>SCOUTING</b>
					</div>

					<div class="menu_button" id="menu_button_test2" onclick="changePage(2);">
						<b>USER</b>
					</div>

					<div class="menu_button" id="menu_button_test3" onclick="changePage(3);">
						<b>RAW DATA</b>
					</div>

					<div class="menu_button" id="menu_button_test4" onclick="changePage(4);">
						<b>TEAMS</b>
					</div>

					<div class="menu_button" id="menu_button_contact" onclick="changePage(5);">
						<b>CONTACT</b>
					</div>
				</div>
				<div id="menuLine"></div>
				<!-- End of menu and buttons -->
				<!-- Content of page -->
				<div class="content">
				    <div id="div_loginPage">
				        <?php
				            include "php/login.php";
				        ?>
				    </div>
				    
				    <div id="div_scoutingPage" >
				        <?php
				            include "php/scouting.php";
				        ?>
				    </div>
				    
				    <div id="div_usersPage" >
				        <?php
				            include "php/users.php";
				        ?>
				    </div>
				    
				    <div id="div_rawDataPage" >
				        <?php
				            include "php/rawData.php";
				        ?>
				    </div>
				    
				    <div id="div_teamsPage" >
				        <?php
				            include "php/teams.php";
				        ?>
				    </div>
				    
				    <div id="div_contactPage" >
				        <?php
				            include "php/contact.php";
				        ?>
				    </div>
				</div>
				<!-- End of content of page-->
			</div>
		</div>
		<!-- CSS/PHP Color Implementation -->
			<?php
				if (isset($_SESSION['uid'])){
					$fc = $_SESSION['favColor'];
					$newStyleSheet = "
						<style>
							.menu_button{border-bottom: 5px solid $fc;}
							.menu_button:hover{color: $fc;}
							select:focus {border-bottom: 2px solid $fc;}
							input:focus{border-bottom: 2px solid $fc;}
							.thSorted{background-color: $fc;}


						</style>
					";
					echo $newStyleSheet;
				}
			?>
		<!-- End of Color Implementation -->
		<!-- JAVASCRIPT INCLUDES -->
			<script src="js/jquery-3.1.1.min.js"></script>
			<script src="js/menu.js"></script>
			<script src="js/main.js"></script>
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>