<?php
include 'db.php';
session_start();


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$newuser=$_POST['newuser'];
$newpass=$_POST['newpass'];
$default = 0;

$hashpass = password_hash($newpass, PASSWORD_DEFAULT);

$mysqli->select_db("users");



$query =  $mysqli->prepare("INSERT INTO `login`(`username`, `password`, `firstname`, `lastname`, `email`, `admin`) VALUES (?,?,?,?,?,?)");
$query->bind_param('sssssi', $newuser, $hashpass, $firstname, $lastname, $email, $default);
$query->execute();
$result = $query->get_result();

$query2 = $mysqli->prepare("SELECT * FROM login WHERE username=?");
$query2->bind_param('s', $newuser);
$query2->execute();
$result2 = $query2->get_result();


$data = $result2->fetch_array(MYSQLI_NUM);

$fetchusername = $data[0];
$fetchpassword = $data[1];
$fetchfirstname = $data[2];
$fetchlastname = $data[3];
$fetchemail = $data[4];
$fetchid = $data[5];
$fetchadmin = $data[6];


if($query && $query2){
	$_SESSION['username'] = $fetchusername;
	$_SESSION['password'] = $fetchpassword;
	$_SESSION['firstname'] = $fetchfirstname;
	$_SESSION['lastname'] = $fetchlastname;
	$_SESSION['email'] = $fetchemail;
	$_SESSION['privateid'] = $fetchid;
	$_SESSION['admin'] = $fetchadmin;
	$_SESSION['error'] = NULL;
	header("location:../account/private");
}
else{	
	header("location:../login");
}
