<?php
//Load mysql database and see if user is logged in, if so, redirect to private account page
require '../phpfunctions/db.php';
require '../phpfunctions/logged_in_redirection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Create base url for redirections-->
	<base href="http://localhost/"/>
	<link rel="stylesheet" href="../style.css">
	<!--Google font types-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>

<body>
	<!--Header-->
	<div class = "header_container">
		<div class = "header_content">
			<!--Logo-->
			<p class = "header_logo">dstilz.com</p>
			<!--Navigation-->
			<ul>	
			<li><a href="login" class="current_link">Log in</a></li>
			<li><a href="forum">Forum</a></li>	
			<li><a href="hub/all">Hub</a></li>
			<li><a href="">About</a></li>
			</ul>
		</div>
	</div>
	<!--Explicitly set 800px body container-->
	<!--
	Based on url: 
	https://dstilz.com/login - display login
	https://dstilz.com/registration - display registration
	-->
	<div class = "container_800px">
		<?php
			//Url parsing into queries using '/' as a delimeter
			//Ex: Given 1/2
			//$one = 1, $two = 2
			$directory = $_SERVER['REQUEST_URI'];
			list($one, $two)  = explode("/", $directory);
			//Passes in the query as a parameter into the php function through session data
			$_SESSION['query2'] = $two;
			require '../phpfunctions/display_login.php';
		?>		
		<br>
	</div>
</div>
</body>


</html>


