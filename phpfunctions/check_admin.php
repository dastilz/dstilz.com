<?php
include 'db.php';
session_start();




if ($_SESSION['admin'] == 1){
	echo"
	<div class="inputContainer">
		<p>Subgroup Name:</p><input name="myusername" type ="text" id="myusername">
		<br>
		<p>Link Name:</p><input name="mypassword" type ="password" id="mypassword">
		<br>
		<p>Project Name:</p><input name="mypassword" type ="password" id="mypassword">
		<br>		
		<p><input name="submit" type="submit" value="Login"></p>
	</div>
	";
}