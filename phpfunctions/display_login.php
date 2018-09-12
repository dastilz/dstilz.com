<?php
//Login URL queries passed into as a parameter through session data
$page_type = $_SESSION['query2'];
//If URL query is "login", display login option
if ($page_type == "login"){
	echo "						
	<br>
	<h1>Log in</h1>
	<div class=\"content_container_800px\">
		<form action=\"../phpfunctions/post_login.php\" method=\"post\">	
			<br>
			<div class=\"input_container_500px\">
				<p>Username:</p><input name=\"login_username\" type =\"text\">
				<br>
				<p>Password:</p><input name=\"login_password\" type =\"password\">
				<br>					
				<p><input name=\"submit\" type=\"submit\" value=\"Log in\"></p><br>
				<a class = \"button_width_auto\" href=\"registration\">Register an Account</a>
			</div>
		</form>
	</div>
	";		
}
//If URL query is "registration", display registration option
else if ($page_type == "registration"){
	echo "
		<br>
		<h1>Registration</h1>
		<div class=\"content_container_800px\">
			<form action=\"../phpfunctions/register_account.php\" method=\"post\">		
				<br>
				<div class=\"input_container_500px\">				
					<p>First name:</p><input name=\"first_name\" type = \"text\">
					<br>
					<p>Last name:</p><input name=\"last_name\" type = \"text\">
					<br>					
					<p>E-mail:</p><input name=\"email\" type = \"text\" class=\"email\">
					<br>
					<p>Username:</p><input name=\"register_username\" type = \"text\">
					<br>
					<p>Password:</p><input name=\"register_password\" type = \"password\">
					<br>
					<p><input name=\"submit\" type=\"submit\" value=\"Register\"></p><br>					
					<a class = \"button_width_auto\" href=\"login\">Log in Page</a>
				</div>
			</form>
		</div>
	";
}