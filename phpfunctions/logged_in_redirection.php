<?php 
	//Redirects user if they are logged in
	session_start();
	if (isset($_SESSION['username']))
		header("location:../account/private/?");