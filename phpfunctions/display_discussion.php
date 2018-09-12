<?php
//Update views if needed
require '../phpfunctions/views.php';

//Fetch URL query data
$discussion_id = $_SESSION['query5'];
//Declare new redirection session data
$_SESSION['discussion_id'] = $_SESSION['query5'];
//Find discussion data from SQL query
$mysqli->select_db("users");
$query =  $mysqli->prepare("SELECT * FROM `discussion` WHERE discussion_id = ?");
$query->bind_param('s', $discussion_id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_array(MYSQLI_NUM);	
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

//Begin UI
echo "
<div class=\"container_left_250px\">
	<br>
	<h1>Forum Discussion</h1><br>
";
if (isset($_SESSION['username'])){
	echo "
		<div class=\"content_container_250px\">
			<h1>Post new comment:</h1><br>
			<form action=\"phpfunctions/post_discussion_comment.php\" method=\"post\">
				<textarea class=\"comment_discussion\"name=\"comment\"></textarea><br><br>
				<input name=\"post\" type=\"submit\" value=\"Post\"><br>	
			</form>
		</div><br>
	";
}

echo "
	<div class=\"content_container_250px\">
		<h1>Sort Comments by:</h1><br>
		<div class=\"vertical_link_list\">
			<a href=\"forum/discussions/newest/$discussion_id\">Newest</a><br>
			<a href=\"forum/discussions/oldest/$discussion_id\">Oldest</a><br>
			<a href=\"forum/discussions/mostUpvoted/$discussion_id\">Most Upvoted</a><br>
			<a href=\"forum/discussions/mostDownvoted/$discussion_id\">Most Downvoted</a><br>
		</div>
	</div>
</div>
<div class=\"container_right_550px\"><br>
	<h1>Discussion: </h1><br>
";
//Reuse forum main discussion framework for displaying discussion header
echo "
	<div class=\"content_container_550px\">
		<div class=\"forum_main_dicussion_top\">
			<p class=\"inline_p\">$discussion_name</p>
";
if (isset($_SESSION['username'])){
	echo "
			<a class=\"downvote\" href=\"forum/downvote/discussion/$discussion_id\">Downvote</a>	
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
	<h1>Comments:</h1><br>

";

//Load comments of discussion
require '../phpfunctions/display_discussion_comments.php';

echo "
</div>
";




