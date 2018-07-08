<?php
include 'db.php';
session_start();

$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];


$mysqli->select_db("users");



$query = $mysqli->prepare("SELECT * FROM login WHERE username=?");
$query->bind_param('s', $myusername);
$query->execute();
$result = $query->get_result();


$data = $result->fetch_array(MYSQLI_NUM);

$password = $data[1];
$firstname = $data[2];
$lastname = $data[3];
$email = $data[4];
$id = $data[5];
$admin = $data[6];

if($query && password_verify($mypassword, $password)){
	$_SESSION['username'] = $myusername;
	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['email'] = $email;
	$_SESSION['error'] = NULL;
	$_SESSION['admin'] = $admin;
	$_SESSION['privateid'] = $id;
	header("location:../account/private");
}
else{
	$_SESSION['error'] = "Wrong username and/or password. Try again";
	header("location:../login");
}

