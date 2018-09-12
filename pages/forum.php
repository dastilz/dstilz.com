<?php
require '../phpfunctions/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/"/>
	<link rel="stylesheet" href="../style.css">
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
			<!--
			Change URL "Account/Log in" based on:
			If logged in: Display "Account"
			Anonymous: Display "Log in"
			-->
			<li><a href="
				<?php 
					if (isset($_SESSION['username']))
							echo "account/private/?";
						else
							echo "login";
				?>
			">
				<?php 
					if (isset($_SESSION['username']))
						echo "Account";
					else
						echo "Log in";
				?>
			</a></li>			
			<li><a href="forum" class="current_link">Forum</a></li>
			<li><a href="hub/all">Hub</a></li>
			<li><a href="">About</a></li>
			
			</ul>
		</div>
	</div>
	<div class = "container_800px">
		<p>
		<?php 				
			//Url parsing into queries using '/' as a delimeter
			//Ex: Given 1/2/3/4
			//$one = 1, $two = 2, $three = 3, $four = 4
			$directory = $_SERVER['REQUEST_URI'];
			list($one, $two, $three, $four, $five)  = explode("/", $directory);
			$_SESSION['query2'] = $two;
			$_SESSION['query3'] = $three;
			$_SESSION['query4'] = $four;
			$_SESSION['query5'] = $five;
			if ($three != "main" && $three != "discussions" && $three != "upvote" && $three != "downvote"){
				header("location:../../forum/main/newest/1");
			}
			if ($four != "home" && $four != "newest" && $four != "oldest" && $four != "mostViewed" && 
			    $four != "leastViewed" && $four != "mostUpvoted" && $four != "mostDownvoted" && $four != "discussion" && 
			    $four != "discussion_comment" && $four != "mostCommented" && $four !="leastCommented" && $four !="mostPopular"){
				    header("location:../../forum/main/newest/?");
			}
			if ($three == "main"){
				require '../phpfunctions/display_forum_discussions.php';
			}
			else if ($three == "discussions"){
				require '../phpfunctions/display_discussion.php';
			}
			else if ($three == "upvote" || $three == "downvote"){
				require '../phpfunctions/vote.php';
			}
			else{
				require '../phpfunctions/display_error_404.php';
			}
		?>
		</p>
	</div>
</div>
</body>


</html>