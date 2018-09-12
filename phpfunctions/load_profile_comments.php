<?php
//Get URL query session data
$page_type = $_SESSION['query2'];
$display_type = $_SESSION['query3'];
$public_id = $_SESSION['query4'];
//Get login session data if available
if(isset($_SESSION['username'])){
	$private_id = $_SESSION['private_id'];}
//Determine based on URL query, to load private comments or public account comments
if($display_type == "public"){
	$id = $public_id;}
else if($display_type == "private"){
	$id = $private_id;
}
//SQL query string
$location = "profile";
//Fetch comments from account by SQL query
$mysqli->select_db("users");
$query = $mysqli->prepare("SELECT * FROM comments WHERE id=? AND location=?");
$query->bind_param('ss', $id, $location);
$query->execute();
$result = $query->get_result();

//Iterate through all comments
while ($data = $result->fetch_array(MYSQLI_NUM)){
	//Individual comment data
	$username = $data[0];
	$id = $data[1];
	$comment = $data[2];
	$upvote = $data[3];
	$downvote = $data[4];
	$timestamp = $data[5];
	$location = $data[6];
	$reply_id = $data[7];
	$post_id = $data[8];
	$discussion_id = $data[9];
	
	//Find user id who posted comment
	$query2 = $mysqli->prepare("SELECT * FROM login WHERE username=?");
	$query2->bind_param('s', $username);
	$query2->execute();
	$result2 = $query2->get_result();
	$data2 = $result2->fetch_array(MYSQLI_NUM);
	$comment_user_id = $data2[5];
		
	//Display individual comment
	echo "
	<div class=\"profile_comment\">
		<div class=\"profile_comment_top\">	
			<p class=\"inline_p\"><a href=\"profile/public/$comment_user_id\">$username</a></p>
	";
	if (isset($_SESSION['username'])){
		echo "
				<a class=\"downvote\" href=\"account/downvote/$post_id\">Downvote</a>	
				<a class=\"upvote\" href=\"account/upvote/$post_id\">Upvote</a>
		";
	}
		
	echo "
		</div>
		
		<div class=\"profile_comment_middle\">
			<p>$comment</p><br>
		</div>
		<div class=\"profile_comment_bottom\">				
			<div class=\"profile_comment_bottom_left\">
				<p>&#9650: $upvote &#9660: $downvote</p>
			</div>
			<div class=\"profile_comment_bottom_right\">				
				<p>Posted by <a href=\"account/public/$comment_user_id\">$username</a> on $timestamp</p>
			</div>
		</div>
	</div>
	";
	
}