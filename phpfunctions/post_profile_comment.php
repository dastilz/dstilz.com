<?php
include 'db.php';
session_start();

$username = $_SESSION['username'];
$comment = $_POST['comment'];
$id = $_SESSION['account_id'];

$mysqli->select_db("users");
$default = 0;

$query =  $mysqli->prepare("INSERT INTO `comments`(`username`,`id`, `comment`, `upvote`, `downvote`) VALUES (?,?,?,?,?)");
$query->bind_param('sssii', $username, $id, $comment, $default, $default);
$query->execute();
$result = $query->get_result();

header("location:../account/public/$id");
