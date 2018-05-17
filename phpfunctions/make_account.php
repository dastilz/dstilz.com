<?php
include 'db.php';
session_start();

$mysqli->select_db("users");


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$newuser=$_POST['newuser'];
$newpass=$_POST['newpass'];



$query = "INSERT INTO `login`(`username`, `password`, `firstname`, `lastname`, `email`) VALUES ('$newuser','$newpass','$firstname','$lastname','$email')";

$result = $mysqli->query($query);

if($result){
	$_SESSION['username'] = $newuser;
	$_SESSION['password'] = $newpass;
	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['email'] = $email;
	$_SESSION['error'] = NULL;
	header("location:../pages/account.php");
}
else{	
	header("location:../pages/login.php");
}


