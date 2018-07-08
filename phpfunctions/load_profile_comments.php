<?php

$id = $_SESSION['account_id'];

$mysqli->select_db("users");

$query = $mysqli->prepare("SELECT * FROM comments WHERE id=?");
$query->bind_param('s', $id);
$query->execute();
$result = $query->get_result();

while ($data = $result->fetch_array(MYSQLI_NUM)){
	$username = $data[0];
	$id = $data[1];
	$comment = $data[2];
	
	$query2 = $mysqli->prepare("SELECT * FROM login WHERE username=?");
	$query2->bind_param('s', $username);
	$query2->execute();
	$result2 = $query2->get_result();	
	$data2 = $result2->fetch_array(MYSQLI_NUM);
	$posterid = $data2[5];
		
	
	echo "
	<p>
	<b>Username:</b><br><a href=\"account/public/$posterid\">$username</a></b><br>
	<b>Comment:</b><br>$comment<br><br>	
	</p>
	";
	
}