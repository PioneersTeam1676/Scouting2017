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
					<span class="menu_button" id="menu_button_login" style="background-color:#aaa" onclick="changePage(0);">
						LOGIN
					</span>

					<div class="menu_button" id="menu_button_blog" style="background-color:#faa" onclick="changePage(1);">
						SCOUTING
					</div>

					<div class="menu_button" id="menu_button_test2" style="background-color:#afa" onclick="changePage(2);">
						USERS
					</div>

					<div class="menu_button" id="menu_button_test3" style="background-color:#aaf" onclick="changePage(3);">
						RAW DATA
					</div>

					<div class="menu_button" id="menu_button_test4" style="background-color:#faf" onclick="changePage(4);">
						TEAMS
					</div>

					<div class="menu_button" id="menu_button_contact" style="background-color:#ffa" onclick="changePage(5);">
						CONTACT
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
				            include "php/contact.php";
				        ?>
				    </div>
				    
				    <div id="div_teamsPage" >
				        <?php
				            include "php/contact.php";
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
		<!-- JAVASCRIPT INCLUDES -->
			<script src="js/menu.js"></script>
			<script src="js/main.js"></script>
		<!-- END OF JAVASCRIPT INCLUDES -->
	</body>
</html>