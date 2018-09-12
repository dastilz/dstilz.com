<?php
include 'db.php';
session_start();

//Fetch URL query data
$page_type = $_SESSION['query2'];
$display_type = $_SESSION['query3'];
$public_id = $_SESSION['query4'];
//Get login session data
$username = $_SESSION['username'];
//Get form data
$comment = $_POST['comment'];
//Based on page, declare id for SQL query
if($display_type == "private"){		
	$id = $_SESSION['private_id'];
}
else if ($display_type == "public"){
	$id = $public_id;
}

//Put comment into database
$mysqli->select_db("users");
//SQL query strings
$default = 0;
$location = 'profile';
//Insert into comments database
$query =  $mysqli->prepare("INSERT INTO `comments`(`username`,`id`, `comment`, `upvote`, `downvote`,`location`,`replyid`,`discussionid`) VALUES (?,?,?,?,?,?,?,?)");
$query->bind_param('sssiisii', $username, $id, $comment, $default, $default, $location, $default, $default);
$query->execute();
$result = $query->get_result();

//Based on URL query, redirect to the same page they commented on (public or private)
if($display_type == "public")
	header("location:../account/public/$public_id");
else if($display_type == "private")
	header("location:../account/private/?");