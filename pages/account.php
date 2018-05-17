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
			<li><a href="" style="text-decoration: underline; font-weight: 700">Account</a></li>
			<li><a href="contact.php">Contact</a></li>	
			<li><a href="projects.php">Projects</a></li>
			<li><a href="../index.php">Blog</a></li>
			</ul>
			<!--LOGIN-->
			<!--USE PHP FOR THIS-->
		</div>
	</div>
	<!--USE PHP IN FUTURE TO MAKE OTHER BLOG POSTS-->
	<!--BLOG POST 1-->
	<div id = "bodyContent">
		<p>Welcome!</p>
		<?php
		$username = $_SESSION['username'];
		$firstname = $_SESSION['firstname'];
		$lastname = $_SESSION['lastname'];
		$email = $_SESSION['email'];
		echo "
		<p>Username: $username</p>
		<p>First name: $firstname</p>
		<p>Last name: $lastname</p>
		<p>E-mail: $email</p>"
		;?>
		
		<a href="../phpfunctions/logout.php">Log out</a>		
	</div>
</div>
<!-- USE PHP TO MAKE REST OF BLOG POST OVERVIEWS ON HOME PAGE-->
</body>


</html>