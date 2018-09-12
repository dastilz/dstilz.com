<?php
include 'db.php';
session_start();

//Fetch form information
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$register_username=$_POST['register_username'];
$register_password=$_POST['register_password'];
$default = 0;

//Encrypt password
$hash_password = password_hash($register_password, PASSWORD_DEFAULT);

//Put encrypted password and registration information into the database
$mysqli->select_db("users");
$query1 =  $mysqli->prepare("INSERT INTO `login`(`username`, `password`, `firstname`, `lastname`, `email`, `admin`) VALUES (?,?,?,?,?,?)");
$query1->bind_param('sssssi', $register_username, $hash_password, $first_name, $last_name, $email, $default);
$query1->execute();
$result = $query1->get_result();

//Fetch new registration information with an SQL query
if ($query1){
	$query2 = $mysqli->prepare("SELECT * FROM login WHERE username=?");
	$query2->bind_param('s', $register_username);
	$query2->execute();
	$result2 = $query2->get_result();
	$data = $result2->fetch_array(MYSQLI_NUM);
	if ($query2){
		$_SESSION['username'] = $data[0];
		$_SESSION['password'] = $data[1];
		$_SESSION['first_name'] = $data[2];
		$_SESSION['last_name'] = $data[3];
		$_SESSION['email'] = $data[4];
		$_SESSION['private_id'] = $data[5];
		$_SESSION['admin'] = $data[6];
	}
} 
//Login page will automatically send to account/private if registration worked
header("location:../login");

