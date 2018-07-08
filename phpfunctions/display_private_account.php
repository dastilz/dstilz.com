<?php
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$id = $_SESSION['privateid'];
echo "
<div id = \"bodyContent\">
		<div class=\"blockLeft\">
			<div class=\"uncenteredBlock\">
				<p style=\"text-align: center; text-decoration: underline;\"><b>Account Information</b></p><br>
				<p>
				<b>Username:</b><br>$username<br>
				<b>First name:</b><br>$firstname<br>
				<b>Last name:</b><br>$lastname<br>
				<b>E-mail:</b><br>$email</p><br>
				<a href=\"../phpfunctions/logout.php\">Log out</a><br>
				<a href=\"../account/public/$id\">View public profile</a>
				</p>


							
			</div>
		</div>
		<div class=\"blockRight\">
			<div class=\"uncenteredBlock\">
				<p style=\"text-align: center; text-decoration: underline;\"><b>Comments</b></p><br>
				<p>Go to public profile to post a comment!</p><br>
				<p style=\"text-align: center; text-decoration: underline;\">Your Comment History</p><br>
";

require 'load_private_profile_comments.php';	

echo "				
		</div>
	</div>
";
		
if ($_SESSION['admin'] == 1){
	echo "
		<div id=\"adminContainer\">
			<p style=\"text-decoration: underline;\"><b>Admin Panel</b><br><br></p>
			<form action=\"../phpfunctions/post_project.php\" method=\"post\">
			<div class=\"inputContainer\">						
				<p style=\"text-decoration: underline;\">Submit Project:<br><br></p>
				<p>Subgroup Name:</p><input name=\"subgroupName\" type =\"text\">
				<br>
				<p>Link Name:</p><input name=\"linkName\" type =\"text\">
				<br>
				<p>Project Name:</p><input name=\"projectName\" type =\"text\">
				<br>		
				<p><input name=\"submit\" type=\"submit\" value=\"Submit\"></p>
			</div>
			</form>
			<form action=\"../phpfunctions/post_subgroup.php\" method=\"post\">
			<div class=\"inputContainer\">						
				<br><p style=\"text-decoration: underline;\">Submit Subgroup:<br></p>
				<br>
				<p>Subgroup Name:</p><input name=\"subgroupName\" type =\"text\">
				<br>
				<p>Position:</p><input name=\"position\" type =\"text\">
				<br>	
				<p><input name=\"submit\" type=\"submit\" value=\"Submit\"></p>
			</div>					
			</form>
		</div>		
</div>
	";
}




