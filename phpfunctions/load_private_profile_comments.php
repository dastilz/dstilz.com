<?php

$id = $_SESSION['privateid'];

$mysqli->select_db("users");

$query = $mysqli->prepare("SELECT * FROM comments WHERE id=?");
$query->bind_param('s', $id);
$query->execute();
$result = $query->get_result();

while ($data = $result->fetch_array(MYSQLI_NUM)){
	$username = $data[0];
	$id = $data[1];
	$comments = $data[2];
	$upvote = $data[3];
	$downvote = $data[4];
	$timestamp = $data[5];
	echo "
	<p>
	<b>Username:</b><br><a href=\"account/public/$id\">$username</a></b><br>
	<b>Comment:</b><br>$comments<br><br>	
	</p>
	";
	
}