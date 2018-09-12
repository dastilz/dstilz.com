<?php
//URL queries
$page_type = $_SESSION['query2'];
$display_type = $_SESSION['query3'];
$public_id = $_SESSION['query4'];

if(isset($_SESSION['username'])){
	$private_id = $_SESSION['private_id'];
}

if ($display_type == "public"){
	$id = $public_id;
}
else if($display_type == "private"){
	$id = $private_id;
}


//Fetch account information from SQL query
$mysqli->select_db("users");
$query = $mysqli->prepare("SELECT * FROM login WHERE id=?");
$query->bind_param('s', $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_array(MYSQLI_NUM);	
$username = $data[0];
$first_name = $data[2];
$last_name = $data[3];
$email = $data[4];
$admin = $data[6];
$permission = "";

//Determine admin account or not, create a string for displaying on account
if ($admin == 1){
	$permission = "Admin";
}
else{
	$permission = "Regular";
}
//Display account information on left
echo "
<div class=\"container_800px\">
	<div class=\"container_left_400px\">	
		<br><h1>Account Information</h1>
		<div class=\"content_container_400px\">
			<p>
			<b>Username:</b><br>$username<br>
			<b>First name:</b><br>$first_name<br>
			<b>Last name:</b><br>$last_name<br>
			<b>E-mail:</b><br>$email<br>
			<b>Permission:</b><br>$permission</p><br>
			";
if ($display_type == "private"){
	echo "
			<a href=\"../phpfunctions/logout.php\">Log out</a><br>
			<a href=\"../account/public/$private_id\">View public profile</a>
			</p>
		</div>
	";
}
else{
	echo"
		</div>
";
}	
//If logged in, allow comment posting
if (isset($_SESSION['username'])){
	echo "	
		<h1>Post New Comment:</h1>
		<div class=\"inline_content_container_400px\">
			<form action=\"phpfunctions/post_profile_comment.php\" method=\"post\">
				<div class=\"auto_centered_container\"><br>
					<textarea class=\"comment_text_area\"name=\"comment\"></textarea><br><br>
					<input name=\"post\" type=\"submit\" value=\"Post\"><br>					
				</div>		
			</form>	
		</div>	
	</div>
";
}	
else{
	echo "
	</div>
";
}
//Display comment history
echo "
<div class=\"container_right_400px\">
	<br><h1>Comment History</h1>
";
require 'load_profile_comments.php';	
echo "				
	</div>
</div>
";
					
//If user has admin permissions, allow them access to 'Admin Panel'
if(isset($_SESSION['admin'])){
	if ($_SESSION['admin'] == 1 && $display_type == "private"){
		echo "
		<div class = \"container_800px\">	
			<br><h1>Admin Panel</h1>	
			<div class=\"content_container_800px\">							
				<form action=\"../phpfunctions/post_project.php\" method=\"post\">
					<div class=\"input_container_500px\">						
						<h1>Submit Project:</h1><br>
						<p>Subgroup Name:</p><input name=\"subgroup_name\" type =\"text\">
						<br>
						<p>Link Name:</p><input name=\"link_name\" type =\"text\">
						<br>
						<p>Project Name:</p><input name=\"project_name\" type =\"text\">
						<br>		
						<p><input name=\"submit\" type=\"submit\" value=\"Submit\"></p>
					</div>
				</form>
				<form action=\"../phpfunctions/post_subgroup.php\" method=\"post\">
					<div class=\"input_container_500px\">						
						<br><h1>Submit Subgroup:</h1>
						<br>
						<p>Subgroup Name:</p><input name=\"subgroup_name\" type =\"text\">
						<br>
						<p>Position:</p><input name=\"position\" type =\"text\">
						<br>	
						<p><input name=\"submit\" type=\"submit\" value=\"Submit\"></p>
					</div>					
				</form>
			</div>
		</div>
		<br>
		";
	}
}
//If not logged in and on private page, redirect to login page
if (!isset($_SESSION['username']) && $display_type == "private"){
	require 'location:../login';
}
