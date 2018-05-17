<?php
include 'db.php';
session_start();

$mysqli->select_db("users");

$newuser=$_POST['newuser'];
$newpass=$_POST['newpass'];



$query = "INSERT INTO `login`(`username`, `password`) VALUES ('$newuser','$newpass')";

$result = $mysqli->query($query);

if($result){
	$_SESSION['username'] = $newuser;
	$_SESSION['password'] = $newpass;
	$_SESSION['error'] = NULL;
	header("location:../pages/account.php");
}
else{
	$_SESSION['error'] = "Error";
	header("location:../pages/login.php");
}



