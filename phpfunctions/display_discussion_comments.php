<?php
$mysqli->select_db("users");

//Get URL query session data
$sortType = $_SESSION['query4'];
$discussion_id = $_SESSION['query5'];

//Set session data for redirection
$_SESSION['discussion_current_id'] = $discussion_id;

//SQL query strings
$location = "discussions";

//Based on sorting type, do an SQL query for discussion comments in the order determined by query
if ($sortType == "newest"){$query = $mysqli->prepare("SELECT * FROM `comments` WHERE `discussion_id` = ? AND `location` = ? ORDER BY `timestamp` DESC");}
else if ($sortType == "oldest"){$query = $mysqli->prepare("SELECT * FROM `comments` WHERE `discussion_id` = ? AND `location` = ?");}
else if ($sortType == "mostUpvoted"){$query = $mysqli->prepare("SELECT * FROM `comments` WHERE `discussion_id` = ? AND `location` = ? ORDER BY `upvote` DESC");}
else if ($sortType == "mostDownvoted"){$query = $mysqli->prepare("SELECT * FROM `comments` WHERE `discussion_id` = ? AND `location` = ? ORDER BY `upvote` DESC");}
$query->bind_param('ss', $discussion_id, $location);
$query->execute();
$result = $query->get_result();

//Iterate through all the discussion comments and display each individual comment
while ($data = $result->fetch_array(MYSQLI_NUM)){
	//Comment data
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
	//Display individual comment
	echo "
	<div class=\"content_container_550px\">
		<div class=\"forum_discussion_top\">
			<p class=\"inline_p\"><a href=\"account/public/$id\">$username</a></p>
		";
		if (isset($_SESSION['username'])){
			echo "
					<a class=\"downvote\" href=\"forum/downvote/discussion_comment/$post_id\">Downvote</a>	
					<a class=\"upvote\" href=\"forum/upvote/discussion_comment/$post_id\">Upvote</a>
			";
		}
		
	echo "
		</div>
		
		<div class=\"forum_dicussion_middle\">
			<p>$comment</p><br>
		</div>
		<div class=\"forum_discussion_bottom\">				
			<div class=\"forum_main_discussion_bottom_left\">
				<p>&#9650: $upvote &#9660: $downvote</p>
			</div>
			<div class=\"forum_main_discussion_bottom_right\">				
				<p>Posted by <a href=\"account/public/$id\">$username</a> on $timestamp</p>
			</div>
		</div>
	</div><br>
	";
}