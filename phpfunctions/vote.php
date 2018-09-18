<?php
//Get URL query session data 
$page_type = $_SESSION['query2'];
$vote_type = $_SESSION['query3'];
$location = $_SESSION['query4'];
//Declare id variables based on comment or discussion location
if ($location == "discussion"){	
	$discussion_id = $_SESSION['query5'];
}
else if ($location == "discussion_comment"){
	$discussion_id = $_SESSION['discussion_id'];
	$comment_id = $_SESSION['query5'];
}
//If page type is account, declare variables for account
if ($page_type == "account"){	
	$location = "account";
	$comment_id = $_SESSION['query4'];
	$redirect_account_id = $_SESSION['redirect_account_id'];
}

//Get login session data
$private_id = $_SESSION['private_id'];

//Declare strings for SQL queries
$upvote = "upvote";
$downvote = "downvote";
$default = "0";

$mysqli->select_db("users");

//If upvote
if ($vote_type == "upvote"){
	//If discussion upvoted
	if ($location == "discussion"){
		//Determine if user has already upvoted
		$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `site_location` = ? AND `user_id` = ? AND `discussion_id` = ? AND `comment_id` = ?");
		$query1->bind_param('ssiii', $upvote, $location, $private_id, $discussion_id, $default);
		$query1->execute();
		$result = $query1->get_result();
		//If user hasn't already upvoted, increment upvote and put new data into counter database
		if ($result->num_rows == 0){			
			$query2 =  $mysqli->prepare("UPDATE `discussion` SET `upvote` = `upvote` + 1 WHERE `discussion_id` = ?");
			$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`,`comment_id`) VALUES (?,?,?,?,?)");
			
			$query2->bind_param('i', $discussion_id);
			$query2->execute();
			$query3->bind_param('ssiii', $upvote, $location, $private_id, $discussion_id, $default);
			$query3->execute();
			
		}	
		//Redirect
		header("location:../../../forum/discussions/newest/$discussion_id");
	}
	else if ($location == "discussion_comment"){		
		//Determine if user has already upvoted
		$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `site_location` = ? AND `user_id` = ? AND `discussion_id` = ? AND `comment_id` = ?");
		$query1->bind_param('ssiii', $upvote, $location, $private_id, $discussion_id, $comment_id);
		$query1->execute();
		$result = $query1->get_result();		
		//If user hasn't already upvoted, increment upvote and put new data into counter database
		if ($result->num_rows == 0){					
			$query2 = $mysqli->prepare("UPDATE `comments` SET `upvote` = `upvote` + 1 WHERE post_id = ?");
			$query2->bind_param('i', $comment_id);
			$query2->execute();			
			$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`, `comment_id`) VALUES (?,?,?,?,?)");
			$query3->bind_param('ssiii', $upvote, $location, $private_id, $discussion_id, $comment_id);
			$query3->execute();
		}
		//Redirect
		header("location:../../../forum/discussions/newest/$discussion_id");		
		
	}
	else if ($location == "account"){		
		//Determine if user has already upvoted
		$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `site_location` = ? AND `user_id` = ? AND `discussion_id` = ? AND `comment_id` = ?");
		$query1->bind_param('ssiii', $upvote, $location, $private_id, $default, $comment_id);
		$query1->execute();
		$result = $query1->get_result();		
		//If user hasn't already upvoted, increment upvote and put new data into counter database
		if ($result->num_rows == 0){					
			$query2 = $mysqli->prepare("UPDATE `comments` SET `upvote` = `upvote` + 1 WHERE post_id = ?");
			$query2->bind_param('i', $comment_id);
			$query2->execute();			
			$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`, `comment_id`) VALUES (?,?,?,?,?)");
			$query3->bind_param('ssiii', $upvote, $location, $private_id, $default, $comment_id);
			$query3->execute();
		}
		//Redirect
		if ($redirect_account_id == "?")
			header("location:../../../account/private/?");
		else
			header("location:../../../account/public/$redirect_account_id");		
		
	}
}
//If downvote
else if ($vote_type == "downvote"){
	if ($location == "discussion"){		
		//Determine if user has already upvoted
		$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `site_location` = ? AND `user_id` = ? AND `discussion_id` = ? AND `comment_id` = ?");
		$query1->bind_param('ssiii', $downvote, $location, $private_id, $discussion_id, $default);
		$query1->execute();
		$result = $query1->get_result();		
		//If user hasn't already upvoted, increment upvote and put new data into counter database
		if ($result->num_rows == 0){			
			$query2 =  $mysqli->prepare("UPDATE `discussion` SET `downvote` = `downvote` + 1 WHERE `discussion_id` = ?");
			$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`,`comment_id`) VALUES (?,?,?,?,?)");
			
			$query2->bind_param('i', $discussion_id);
			$query2->execute();
			$query3->bind_param('ssiii', $downvote, $location, $private_id, $discussion_id, $default);
			$query3->execute();
			
		}	
		//Redirect
		header("location:../../../forum/discussions/newest/$discussion_id");
	}
	else if ($location == "discussion_comment"){		
		//Determine if user has already upvoted
		$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `site_location` = ? AND `user_id` = ? AND `discussion_id` = ? AND `comment_id` = ?");
		$query1->bind_param('ssiii', $downvote, $location, $private_id, $discussion_id, $comment_id);
		$query1->execute();
		$result = $query1->get_result();		
		//If user hasn't already upvoted, increment upvote and put new data into counter database
		if ($result->num_rows == 0){					
			$query2 = $mysqli->prepare("UPDATE `comments` SET `downvote` = `downvote` + 1 WHERE post_id = ?");
			$query2->bind_param('i', $comment_id);
			$query2->execute();			
			$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`, `comment_id`) VALUES (?,?,?,?,?)");
			$query3->bind_param('ssiii', $downvote, $location, $private_id, $discussion_id, $comment_id);
			$query3->execute();
		}
		header("location:../../../forum/discussions/newest/$discussion_id");	
	}
	
	else if ($location == "account"){		
		//Determine if user has already upvoted
		$query1 = $mysqli->prepare("SELECT * FROM `counter` WHERE `counter_type` = ? AND `site_location` = ? AND `user_id` = ? AND `discussion_id` = ? AND `comment_id` = ?");
		$query1->bind_param('ssiii', $downvote, $location, $private_id, $default, $comment_id);
		$query1->execute();
		$result = $query1->get_result();		
		//If user hasn't already upvoted, increment upvote and put new data into counter database
		if ($result->num_rows == 0){					
			$query2 = $mysqli->prepare("UPDATE `comments` SET `downvote` = `downvote` + 1 WHERE post_id = ?");
			$query2->bind_param('i', $comment_id);
			$query2->execute();			
			$query3 = $mysqli->prepare("INSERT INTO `counter` (`counter_type`, `site_location`, `user_id`, `discussion_id`, `comment_id`) VALUES (?,?,?,?,?)");
			$query3->bind_param('ssiii', $downvote, $location, $private_id, $default, $comment_id);
			$query3->execute();
		}
		//Redirect
		if ($redirect_account_id == "?")
			header("location:../../../account/private/?");
		else
			header("location:../../../account/public/$redirect_account_id");		
		
	}
}
