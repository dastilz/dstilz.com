<?php
include 'db.php';
session_start();

//Fetch login session data
$username = $_SESSION['username'];
$id = $_SESSION['private_id'];
//Fetch post data
$discussion = $_POST['discussion'];
//SQL query strings
$default = 0;
$location = 'forum_main';

//Insert new discussion into discussion database
$mysqli->select_db("users");
$query =  $mysqli->prepare("INSERT INTO `discussion`(`username`,`username_id`, `discussion_name`, `upvote`, `downvote`,`page_location`, `discussion_views`, `discussion_comments`) VALUES (?,?,?,?,?,?,?,?)");
$query->bind_param('sisiisii', $username, $id, $discussion, $default, $default, $location, $default, $default);
$query->execute();
$result = $query->get_result();

//Redirect to forum/main/newest
header("location:../forum/main/newest/?");
