<?php
//If not logged on, ignore
if(isset($_SESSION['username'])){	
	//Fetch URL query session data
	$vote_type = $_SESSION['query3'];
	$location = $_SESSION['query4'];
	$discussion_id = $_SESSION['query5'];
	//Fetch user id session data
	$user_id = $_SESSION['private_id'];
	//SQL query strings
	$default = "0";
	$views = "views";
	$location = "discussion";

	//First, check for whether or not it has been previously viewed
	$mysqli->select_db("users");
	$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `user_id` = ? AND `discussion_id` = ?");
	$query1->bind_param('sii', $views, $user_id, $discussion_id);
	$query1->execute();
	$result = $query1->get_result();
	//If discussion hasn't been viewed, increment discussion views
	if ($result->num_rows == 0){			
		//Increment discussion views
		$query2 =  $mysqli->prepare("UPDATE `discussion` SET `discussion_views` = `discussion_views` + 1 WHERE `discussion_id` = ?");
		//Insert view into database so views aren't repeated
		$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`,`comment_id`) VALUES (?,?,?,?,?)");
		$query2->bind_param('i', $discussion_id);
		$query2->execute();
		$query3->bind_param('ssiii', $views, $location, $user_id, $discussion_id, $default);
		$query3->execute();
	}	
}

	
	