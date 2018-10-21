<?php

// initializing variables
$username = "";
$email    = "";
$errors_reg = array(); 
$errors_log = array();

// connect to the database
$GLOBALS['$db'] = mysqli_connect('localhost', 'root', '', 'projet_web');


function getUser()
{
	$user_check_query = "SELECT * FROM users";
	$result = mysqli_query($GLOBALS['$db'], $user_check_query);
	return $result;
}

function getUserId($id)
{
	$user_check_query = "SELECT * FROM users where id_usr = ".$id;
	$result = mysqli_query($GLOBALS['$db'], $user_check_query);
	return $result;
}

?>