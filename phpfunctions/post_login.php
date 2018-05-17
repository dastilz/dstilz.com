<?php
include 'db.php';
session_start();

$mysqli->select_db("users");

$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

/* prevents SQL injection, wasn't working for some reason?
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
*/

$query = "SELECT * FROM login WHERE username='$myusername' and password='$mypassword'";
$result = $mysqli->query($query);
$count = mysqli_num_rows($result);

if($count==1){
	$_SESSION['username'] = $myusername;
	$_SESSION['password'] = $mypassword;
	$_SESSION['error'] = NULL;
	header("location:../pages/account.php");
}
else{
	$_SESSION['error'] = "Wrong username and/or password. Try again";
	header("location:../pages/login.php");
}
