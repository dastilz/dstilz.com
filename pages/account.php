<?php
//Load mysql database
require '../phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Create base url for redirections-->
	<base href="http://localhost/"/>
	<link rel="stylesheet" href="../style.css">
	<!--Google font types-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>

<body>
	<!--Header-->
	<div class = "header_container">
		<div class = "header_content">
			<!--Logo-->
			<p class = "header_logo">dstilz.com</p>
			<!--Navigation-->
			<ul>				
			<?php
			//Url parsing into queries using '/' as a delimeter
			//Ex: Given 1/2/3/4
			//$one = 1, $two = 2, $three = 3, $four = 4
			
			$directory = $_SERVER['REQUEST_URI'];
			list($one, $two, $three, $four) = explode("/", $directory);
			//Put this information into session data to use it later in the html file
			$_SESSION['query2'] = $two;
			$_SESSION['query3'] = $three;
			$_SESSION['query4'] = $four;
			if ($three == "public"){
				//Make session data storing current account page id for voting redirections
				$_SESSION['redirect_account_id'] = $four;
				if (isset($_SESSION['username']))
					echo "<li><a href=\"account/private/?\">Account</a></li>";
				else
					echo "<li><a class=\"current_link\" href=\"login\">Log in</a></li>";		
			}
			else if ($three == "private"){
				//Make session data storing private page for voting redirections
				$_SESSION['redirect_account_id'] = $four;
				echo "<li><a href=\"login\" class=\"current_link\"\">Account</a></li>";
			}
			else if ($three == "upvote" || $three == "downvote")
				require '../phpfunctions/vote.php';
				
			?>
			<li><a href="forum">Forum</a></li>	
			<li><a href="hub/all">Hub</a></li>
			<li><a href="">About</a></li>
			</ul>
		</div>
	</div>
	<?php 	
		//From previous url parsing, use session data in display function
		require '../phpfunctions/display_account.php';		
	?>	
</body>


</html>