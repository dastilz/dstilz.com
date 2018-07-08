<?php
$default = false;
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
	<!--HEADER-->
	<div id = "headerContainer">
		<div id = "headerContent">
			<!--LOGO-->
			<p id = "logo">dstilz.com</p>
			<!--NAV-->
			<ul>	
			<?php
			$directory = $_SERVER['REQUEST_URI'];
			list($empty, $name, $display) = explode("/", $directory);
				if ($display == "public"){
					if (isset($_SESSION['username'])){
						echo "<li><a href=\"account/private\">Account</a></li>";
					}
					else{
						echo "<li><a href=\"login\">Log in</a></li>";
					}					
				}
				else if ($display == "private"){
					echo "<li><a href=\"login\" style=\"text-decoration: underline; font-weight: 700\">Account</a></li>";			
				}
			?>
			<li><a href="forum">Forum</a></li>	
			<li><a href="projects/all">Projects</a></li>
			<li><a href="">About</a></li>
			</ul>
		</div>
	</div>
	<?php 	
		$directory = $_SERVER['REQUEST_URI'];
		list($empty, $name, $display) = explode("/", $directory);
		if ($display == "public"){						
			list($empty, $name, $display, $number) = explode("/", $directory);
			$_SESSION['account_id'] = $number;		
			require '../phpfunctions/display_public_account.php';	
		}
		else if ($display == "private"){
			if (isset($_SESSION['username']))
			{
				require '../phpfunctions/display_private_account.php';
			}
			else{
				header("location:../login");
			}
		}
	?>	
</body>


</html>