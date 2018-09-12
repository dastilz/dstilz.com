<?php
include 'db.php';
$mysqli->select_db("hub");

//Fetch post data
$subgroup_name=$_POST['subgroup_name'];
$position=$_POST['position'];

//Insert new subgroup into database
if($query =  $mysqli->prepare("INSERT INTO `subgroups`(`names`, `position`) VALUES (?,?)")){
	$query->bind_param('ss', $subgroup_name, $position);
	$query->execute();
}

header("location:../account/private/?");


