<?php
require '../phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/"/>
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
			<ul>	
			<li><a href="
				<?php 
					if (isset($_SESSION['username']))
							echo "account/private";
						else
							echo "login";
				?>
			">
				<?php 
					if (isset($_SESSION['username']))
						echo "Account";
					else
						echo "Log in";
				?>
			</a></li>			
			<li><a href="forum" style="text-decoration: underline; font-weight: 700">Forum</a></li>
			<li><a href="projects/all">Projects</a></li>
			<li><a href="">About</a></li>
			
			</ul>
		</div>
	</div>
	<div id = "bodyContent">
	<p>This is a work in progress!</p>
	</div>
</div>
</body>


</html>