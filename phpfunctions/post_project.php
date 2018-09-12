<?php
include 'db.php';
$mysqli->select_db("hub");
//Fetch post data
$subgroup_name=$_POST['subgroup_name'];
$link_name=$_POST['link_name'];
$project_name=$_POST['project_name'];
//Custom html content, for future
//For now, empty
$content = "";

//Insert new project into database
if($query =  $mysqli->prepare("INSERT INTO `posts`(`subgroup`, `linkName`, `name`, `content`) VALUES (?,?,?,?)")){
	$query->bind_param('ssss', $subgroup_name, $link_name, $project_name, $content);
	$query->execute();
}
	
header("location:../account/private/?");


