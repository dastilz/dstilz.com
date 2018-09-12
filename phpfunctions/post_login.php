<?php
include 'db.php';
session_start();

//Fetch login information from SQL query
$login_username=$_POST['login_username'];
$login_password=$_POST['login_password'];
$mysqli->select_db("users");
$query = $mysqli->prepare("SELECT * FROM login WHERE username=?");
$query->bind_param('s', $login_username);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_array(MYSQLI_NUM);
if ($data){
	$username = $data[0];
	$hash_password = $data[1];
	$first_name = $data[2];
	$last_name = $data[3];
	$email = $data[4];
	$private_id = $data[5];
	$admin = $data[6];
}

//Verify login information
if($query && password_verify($login_password, $hash_password)){
	//If verified login information, create user session data and send to private account page
	$_SESSION['username'] = $username;
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['email'] = $email;
	$_SESSION['admin'] = $admin;
	$_SESSION['private_id'] = $private_id;
	header("location:../account/private/?");
}


else{
	header("location:../login");
}


