<?php
$id = $_SESSION['account_id'];

$mysqli->select_db("users");

$query = $mysqli->prepare("SELECT * FROM login WHERE id=?");
$query->bind_param('s', $id);
$query->execute();
$result = $query->get_result();


$data = $result->fetch_array(MYSQLI_NUM);

$username = $data[0];
$firstname = $data[2];
$lastname = $data[3];
$email = $data[4];
$admin = $data[6];
$permission = "";

if ($admin == 1){
	$permission = "Admin";
}
else{
	$permission = "Regular";
}


echo "
<div id = \"bodyContent\">
	<div class=\"blockLeft\">
		<div class=\"uncenteredBlock\">
			<p style=\"text-align: center; text-decoration: underline;\"><b>Account Information</b></p><br>
			<p>
			<b>Username:</b><br>$username<br>
			<b>First name:</b><br>$firstname<br>
			<b>Last name:</b><br>$lastname<br>
			<b>E-mail:</b><br>$email<br>
			<b>Permission:</b><br>$permission</p><br>
			</p>


						
		</div>
	</div>
	<div class=\"blockRight\">
		<div class=\"uncenteredBlock\">
			<p style=\"text-align: center; text-decoration: underline;\"><b>Comments</b></p>
";		
if (isset($_SESSION['username'])){
echo "
			<form action=\"phpfunctions/post_profile_comment.php\" method=\"post\">
				<div class=\"postCommentContainer\">						
					<br><p style=\"text-decoration: underline;\">Post a comment:<br></p>
					<br>
					<textarea id=\"commentTextArea\"name=\"comment\"></textarea><br><br>
					<input name=\"post\" type=\"submit\" value=\"Post\"><br>					
				</div>		
			</form>		
			
";
}
echo "
<p style=\"text-decoration: underline; text-align: center;\">Comment History</p><br>
";

require 'load_profile_comments.php';	

echo "				
		</div>
	</div>
</div>
";

