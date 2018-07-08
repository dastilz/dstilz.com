<?php
require 'phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/"/>
	<link rel="stylesheet" href="style.css">
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
			<li><a href="forum">Forum</a></li>
			<li><a href="projects/all">Projects</a></li>
			<li><a href="" style="text-decoration: underline; font-weight: 700">About</a></li>
			
			</ul>
		</div>
	</div>
	<div id = "bodyContent">		
		<div class = "blockLeft">
			<div class="uncenteredBlock">
				<p>
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE			
				THIS WILL BE AN IMAGE THIS WILL BE AN IMAGE
				</p>
			</div>			
			<div class="uncenteredBlock">
				<p>
				Hi! I'm David Stilz, a 3rd-year computer science student at the University of Kentucky. I created this website to learn the basics of a Linux, Apache, MySQL, and PHP (LAMP) stack. 
				Further, I created this website to be a hub for any projects or miscellanious computer science content I create. My projects page is where this hub resides. I also created this
				website as a way to showcase myself to employers. For this reason, I have listed my resume and contact information for any business inquiries to the right.
				</p>
			</div>
			
		</div>
		<div class = "blockRight">
			<div class="uncenteredBlock">				
				<p style="text-align: center; text-decoration: underline;">
				<b>Contact Information / Resume</b><br><br>
				</p>
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
			<div class="uncenteredBlock">
				<p style="text-align: center; text-decoration: underline;">
				<b>Website Specifications</b><br><br>
				</p>
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