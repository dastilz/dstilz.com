<?php
//Load mysql database
require 'phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!--Create base url for redirections-->
	<base href="http://localhost/"/>
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"/>
	<link rel="stylesheet" href="style.css">
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
			<li><a href="hub/all">Hub</a></li>
			<!--Current page is bolded-->
			<li><a href="" class="current_link">About</a></li>			
			</ul>
		</div>
	</div>
	<!--Explicitly set 800px body container-->
	<!--For the home page "About", this page is split into two, even sections (400px)-->
	<!--This page displays my bio, contact information, and website specifications-->
	<div class = "container_800px">		
		<div class = "container_left_400px">
			<!--Professional headshot-->
			<div class="content_container_400px">
				<p>
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE			
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				</p>
			</div>			
			<!--Bio-->
			<div class="content_container_400px">
				<p>
				Hi! I'm David Stilz, a 3rd-year computer science student at the University of Kentucky. I created this website to learn the basics of a Linux, Apache, MySQL, and PHP (LAMP) stack. 
				Further, I created this website to be a hub for any projects or miscellanious computer science content I create. I have a hub page on this site for this content. 
				</p>
			</div>
			
		</div>
		<div class = "container_right_400px">
			<!--Contact information-->
			<div class="content_container_400px">				
				<h1>Contact Information / Resume</h1><br>
				<p>
					<b>Full Name:</b><br>David Stilz<br>
					<b>Age:</b><br>20<br>
					<b>Location:</b><br>Lexington, KY 40503<br>
					<b>Phone Number:</b><br>(859) 475-3371<br>
					<b>Business E-mail:</b><br>dastilz7@gmail.com<br>
					<b>School E-mail:</b><br>dast236@uky.edu<br>
					<b>Github:</b><br>https://github.com/dastilz<br>
					<b>Resume:</b><br>link
				</p>
			</div>
			<!--Website specifications-->
			<div class="content_container_400px">
				<h1>Website Specifications</h1><br>
				<p>
					<b>Host:</b><br>DigitalOcean<br>
					<b>Memory:</b><br>1 GB<br>
					<b>Disk Size:</b><br>25 GB<br>
					<b>Operating System:</b><br>Linux Ubuntu 16.04.4 x64<br>
					<b>Server:</b><br>Apache 2.4.33<br>
					<b>Languages Used:</b><br>HTML5, CSS, PHP, MySQL<br>
					<b>SSL Certification:</b><br>Let's Encrypt<br>
					<b>Source Code:</b><br>https://github.com/dastilz/dstilz.com</br>
				</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>