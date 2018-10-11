<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors_reg = array(); 
$errors_log = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projet_web');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $userFirstname = mysqli_real_escape_string($db, $_POST['userFirstname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors_reg, "Username is required"); }
  if (empty($userFirstname)) { array_push($errors_reg, "UserFirstname is required"); }
  if (empty($email)) { array_push($errors_reg, "Email is required"); }
  if (empty($password_1)) { array_push($errors_reg, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors_reg, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE (Name='$username' AND First_name='$userFirstname' )OR Mail='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Name'] === $username) {
      array_push($errors_reg, "Username already exists");
    }

    if ($user['Mail'] === $email) {
      array_push($errors_reg, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors_reg) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (Name, First_name, Mail, psswd, User_permission) 
          VALUES('$username','$userFirstname', '$email', '$password',1)";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $mail = mysqli_real_escape_string($db, $_POST['mail']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($mail)) {
    array_push($errors_log, "Mail is required");
  }
  if (empty($password)) {
    array_push($errors_log, "Password is required");
  }

  if (count($errors_log) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE Mail='$mail' AND psswd='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $row = $results->fetch_array(MYSQLI_ASSOC);
      $_SESSION['username'] = $row['Name'];
      //$_SESSION['type'] = $row['type'];
      $_SESSION['email'] = $mail;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors_log, "Wrong username/password combination");
    }
  }
}


//Send Email
if (isset($_POST['contact'])) {


$to = 'ant.lefalher@gmail.com';

$subject = $_POST['subject'];

if(isset($_POST['email'])) {

$name = $_POST['name'];

$email = $_POST['email'];

$fields = array(

0 =>array(

'text' => 'Name',

'val' => $_POST['name']

),

1 =>array(

'text' => 'Email address',

'val' => $_POST['email']

),

2 =>array(

'text' => 'Message',

'val' => $_POST['message']

)

);

$message = "";

foreach($fields as $field) {

$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";

}

$headers = '';

$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";

$headers .= "Reply-To: " .  $email . "\r\n";

$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port","465");
ini_set("sendmail_from", $email);

if (mail($to, $subject, $message, $headers)){

$arrResult = array ('response'=>'success');

} else{

$arrResult = array ('response'=>'error');

}


} else {

$arrResult = array ('response'=>'error');

}
}

// gestion panier

if ( isset($_SESSION['parpaing'.'1']) )
{
	for ($nombre_de_parpaing_different = 1 ; $nombre_de_parpaing_different <= 4 ; $nombre_de_parpaing_different++)
	{
		if ( isset($_POST['submit'.$nombre_de_parpaing_different.'+']) )
		{
			$_SESSION['parpaing'.$nombre_de_parpaing_different] = $_SESSION['parpaing'.$nombre_de_parpaing_different] + 1;
		}
		if ( isset($_POST['submit'.$nombre_de_parpaing_different.'-']) )
		{
			$_SESSION['parpaing'.$nombre_de_parpaing_different] = $_SESSION['parpaing'.$nombre_de_parpaing_different] - 1;
		}
		if ( isset($_POST['delete_panier'.$nombre_de_parpaing_different]) )
		{
			$_SESSION['parpaing'.$nombre_de_parpaing_different] = 0 ;
		}
	}
}
else
{
	$_SESSION['parpaing'.'1'] = 0 ;
	$_SESSION['parpaing'.'2'] = 0 ;
	$_SESSION['parpaing'.'3'] = 0 ;
	$_SESSION['parpaing'.'4'] = 0 ;
	if ( isset($_POST['submit1']) )
	{
		$_SESSION['parpaing'.'1'] = 1;//$_POST['parpaing'.'1'] ;
	}
	elseif ( isset($_POST['submit2']) )
	{
		$_SESSION['parpaing'.'2'] = 1;//$_POST['parpaing'.'2'] ;
	}
	elseif ( isset($_POST['submit3']) )
	{
		$_SESSION['parpaing'.'3'] = 1;//$_POST['parpaing'.'3'] ;
	}
	elseif ( isset($_POST['submit4']) )
	{
		$_SESSION['parpaing'.'4'] = 1;//$_POST['parpaing'.'4'] ;
	}
}

?>