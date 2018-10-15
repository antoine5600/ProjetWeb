<?php

// initializing variables
$username = "";
$email    = "";
$errors_reg = array(); 
$errors_log = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projet_web');


function getUser()
{
	$user_check_query = "SELECT * FROM users LIMIT 1";
	$result = mysql_query($user_check_query);
	return $result;
}

?>