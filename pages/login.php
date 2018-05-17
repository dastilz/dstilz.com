<?php
require '../phpfunctions/db.php';
require '../phpfunctions/conf.php';
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
			<li><a href="" style="text-decoration: underline; font-weight: 700">Log in</a></li>
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
		<form action="../phpfunctions/post_login.php" method="post">	
			<p>WARNING: PASSWORDS ARE NOT ENCRYPTED CURRENTLY</p>
			<p>ALL ACCOUNTS WILL BE DELETED AFTER TESTING PHASE</p>
			<br>
			<p>Log in:</p>
			<p>Username: <input name="myusername" type ="text" id="myusername"></p>
			<p>Password: <input name="mypassword" type ="password" id="mypassword"></p>
			<p><input name="submit" type="submit" value="Login"></p>
		</form>
		<br>
		<p>New? Make an account!</p>
		<form action="../phpfunctions/make_account.php" method="post">
			<p>Username: <input name="newuser" type = "text" id="newuser"></p>
			<p>Password: <input name="newpass" type = "password" id="newpass"></p>
			<p><input name="submit" type="submit" value="Submit"></p>
		</form>
	</div>
</div>
<!-- USE PHP TO MAKE REST OF BLOG POST OVERVIEWS ON HOME PAGE-->
</body>


</html>



