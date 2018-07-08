<?php
include 'db.php';
$mysqli->select_db("projects");

$subgroup=$_POST['subgroupName'];
$position=$_POST['position'];

$content = "";

if($query =  $mysqli->prepare("INSERT INTO `subgroups`(`names`, `position`) VALUES (?,?)")){
	$query->bind_param('ss', $subgroup, $position);
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

