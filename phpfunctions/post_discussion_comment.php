<?php
include 'db.php';
session_start();

//Fetch login session data
$username = $_SESSION['username'];
$id = $_SESSION['private_id'];
//Fetch URL query data
$discussion_id = $_SESSION['query5'];
//Fetch post data
$comment = $_POST['comment'];
//SQL query strings
$default = 0;
$location = "discussions"; 

$mysqli->select_db("users");
//Insert comment into comments database
$query1 = $mysqli->prepare("INSERT INTO `comments`(`username`,`id`, `comment`, `upvote`, `downvote`,`location`,`reply_id`,`discussion_id`) VALUES (?,?,?,?,?,?,?,?)");
$query1->bind_param('sssiisii', $username, $id, $comment, $default, $default, $location, $default, $discussion_id);
$query1->execute();
$result1 = $query1->get_result();

//Increment discussion comment counter
$query2 =  $mysqli->prepare("UPDATE `discussion` SET `discussion_comments` = `discussion_comments` + 1 WHERE `discussion_id` = ?");
$query2->bind_param('s', $discussion_id);
$query2->execute();
$result2 = $query2->get_result();

//Redirect to discussion
header("location:../forum/discussions/newest/$discussion_id");
