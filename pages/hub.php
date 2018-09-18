<?php
//Load mysql database
require '../phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!--Create base url for redirections-->
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
			<!--
			Change URL "Account/Log in" based on:
			If logged in: Display "Account"
			Anonymous: Display "Log in"
			-->
			<li><a href="
				<?php 
					if (isset($_SESSION['username']))
							echo "account/private/?\">Account";
						else
							echo "login\">Log in";
				?>
			</a></li>			
			<li><a href="forum">Forum</a></li>
			<li><a href="hub/all" class="current_link">Hub</a></li>
			<li><a href="">About</a></li>
			</ul>
		</div>
	</div>
	<!--Explicitly set 800px body container-->
	<div class = "container_800px">
		<!--
		Based on url:
		https://dstilz.com/hub/all - Shows all hub content
		https://dstilz.com/hub/CONTENT - Show specific hub content
		-->
		<?php 	
			$directory = $_SERVER['REQUEST_URI'];
			list($one, $two, $three)  = explode("/", $directory);
			$_SESSION['query3'] = $three;
			require '../phpfunctions/display_hub.php';	
		?>
	</div>
</div>
</body>


</html>






