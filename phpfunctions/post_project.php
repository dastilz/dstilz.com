<?php
include 'db.php';
$mysqli->select_db("projects");

$subgroup=$_POST['subgroupName'];
$link=$_POST['linkName'];
$name=$_POST['projectName'];
$content = "";

if($query =  $mysqli->prepare("INSERT INTO `posts`(`subgroup`, `linkName`, `name`, `content`) VALUES (?,?,?,?)")){
	$query->bind_param('ssss', $subgroup, $link, $name, $content);
	$query->execute();
}
else{
	$error = $mysqli->errno.' ' . $mysqli->error;
	echo $error;
}

if ($query)
{
	header("location:../account");
}

