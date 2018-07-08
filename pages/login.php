<?php
require '../phpfunctions/db.php';
require '../phpfunctions/conf.php';
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
			<li><a href="login" style="text-decoration: underline; font-weight: 700">Log in</a></li>
			<li><a href="forum">Forum</a></li>	
			<li><a href="projects/all">Projects</a></li>
			<li><a href="">About</a></li>
			</ul>
		</div>
	</div>
	<div id = "bodyContent">
		<br>
		<div class="formContainer">
			<form action="../phpfunctions/post_login.php" method="post">	
				<h1>Log in</h1>
				<br>
				<div class="inputContainer">
					<p>Username:</p><input name="myusername" type ="text" id="myusername">
					<br>
					<p>Password:</p><input name="mypassword" type ="password" id="mypassword">
					<br>					
					<p><input name="submit" type="submit" value="Login"></p>
				</div>
			</form>
		</div>
		<br>
		<div class="formContainer">
			<form action="../phpfunctions/make_account.php" method="post">		
				<h1>Registration</h1>
				<br>
				<div class="inputContainer">				
					<p>First name:</p><input name="firstname" type = "text" id="firstname">
					<br>
					<p>Last name:</p><input name="lastname" type = "text" id="lastname">
					<br>					
					<p>E-mail:</p><input name="email" type = "text" id="email">
					<br>
					<p>Username:</p><input name="newuser" type = "text" id="newuser">
					<br>
					<p>Password:</p><input name="newpass" type = "password" id="newpass">
					<br>
					<p><input name="submit" type="submit" value="Submit"></p>				
				</div>
			</form>
		</div>
		<br>
	</div>
</div>
</body>


</html>
?>


