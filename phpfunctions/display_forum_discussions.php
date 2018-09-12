<?php
//Get URL query session data
$sortType = $_SESSION['query4'];

//Based on sorting type, do an SQL query for discussions in the order determined by query
$mysqli->select_db("users");
if ($sortType == "newest"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `timestamp` DESC");}
else if ($sortType == "oldest"){$query = $mysqli->prepare("SELECT * FROM discussion");}
else if ($sortType == "mostViewed"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `discussion_views` DESC");}
else if ($sortType == "leastViewed"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `discussion_views` ASC");}
else if ($sortType == "mostUpvoted"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `upvote` DESC");}
else if ($sortType == "mostDownvoted"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `upvote` DESC");}
else if ($sortType == "mostCommented"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `discussion_comments` DESC");}
else if ($sortType == "leastCommented"){$query = $mysqli->prepare("SELECT * FROM discussion ORDER BY `discussion_comments` ASC");}
$query->execute();
$result = $query->get_result();

//Begin UI
echo "
<div class=\"container_left_250px\">
	<br>
	<h1>Forum Discussions</h1><br>
";
if (isset($_SESSION['username'])){
	echo "
		<div class=\"content_container_250px\">
			<h1>Post new discussion:</h1><br>
			<form action=\"phpfunctions/post_new_discussion.php\" method=\"post\">	
			<p>Discussion name:</p><input name=\"discussion\" type =\"text\"><br>
			<input name=\"submit\" type=\"submit\" value=\"Post\"></p>
		</div><br>
	";
}
//Sort Discussion Vertical list
echo "
	<div class=\"content_container_250px\">
		<h1>Sort Discussions by:</h1><br>
		<div class=\"vertical_link_list\">
			<a href=\"forum/main/newest/?\">Newest</a><br>
			<a href=\"forum/main/oldest/?\">Oldest</a><br>
			<a href=\"forum/main/mostViewed/?\">Most Viewed</a><br>
			<a href=\"forum/main/leastViewed/?\">Least Viewed</a><br>
			<a href=\"forum/main/mostUpvoted/?\">Most Upvoted</a><br>
			<a href=\"forum/main/mostDownvoted/?\">Most Downvoted</a><br>
			<a href=\"forum/main/mostCommented/?\">Most Commented</a><br>
			<a href=\"forum/main/leastCommented/?\">Least Commented</a><br>
		</div>
	</div>
</div>
<div class=\"container_right_550px\"><br>
";

//Iterate through all the discussions and display each individual discussion
while ($data = $result->fetch_array(MYSQLI_NUM)){	
	//Discussion data
	$username = $data[0];
	$username_id = $data[1];
	$discussion_name = $data[2];
	$upvote = $data[3];
	$downvote = $data[4];
	$timestamp = $data[5];
	$page_location = $data[6];
	$discussion_id = $data[7];
	$discussion_views = $data[8];
	$discussion_comments = $data[9];
	//Display individual discussion
	echo "
		<div class=\"content_container_550px\">
			<div class=\"forum_main_dicussion_top\">
				<a href=\"forum/discussions/newest/$discussion_id\">$discussion_name</a>
	";
	if (isset($_SESSION['username'])){
		echo "
				<a class=\"downvote\" href=\"forum/downvote/discussion//$discussion_id\">Downvote</a>	
				<a class=\"upvote\" href=\"forum/upvote/discussion/$discussion_id\">Upvote</a>
		";
	}
		
	echo "	
				<p>$discussion_comments comments, $discussion_views views</p>
			</div>
			
			<div class=\"forum_main_dicussion_bottom\">
				<div class=\"forum_main_discussion_bottom_left\">
					<p>&#9650: $upvote &#9660: $downvote</p>
				</div>
				<div class=\"forum_main_discussion_bottom_right\">				
					<p>Posted by <a href=\"account/public/$username_id\">$username</a> on $timestamp</p>
				</div>
			</div>
		</div><br>
	";		

		
}


echo "
</div>
";




