<?php
require '../phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../style.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>

<body>
	<!--HEADER-->
	<div id = "headerContainer">
		<div id = "headerContent">
			<!--LOGO-->
			<p id = "logo">dstilz.com</p>
			<!--NAV-->
			<ul>	
			<li><a href="
				<?php 
					if (isset($_SESSION['username']))
							echo "account";
						else
							echo "login";
				?>
			.php">
				<?php 
					if (isset($_SESSION['username']))
						echo "Account";
					else
						echo "Log in";
				?>
			</a></li>
			<li><a href="contact.php">Contact</a></li>	
			<li><a href="" style="text-decoration: underline; font-weight: 700">Projects</a></li>
			<li><a href="../index.php">Blog</a></li>
			</ul>
			<!--LOGIN-->
			<!--USE PHP FOR THIS-->
		</div>
	</div>
	<!--USE PHP IN FUTURE TO MAKE OTHER BLOG POSTS-->
	<!--BLOG POST 1-->
	<div id = "bodyContent">		
	</div>
</div>
<!-- USE PHP TO MAKE REST OF BLOG POST OVERVIEWS ON HOME PAGE-->
</body>


</html>