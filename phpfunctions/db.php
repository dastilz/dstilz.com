<?php
//mySQL connection settings
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'users';
//Create mysqli object
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);


