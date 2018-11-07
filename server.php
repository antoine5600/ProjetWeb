<?php
include('session.php') ;

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
  $civ = mysqli_real_escape_string($db, $_POST['customer_title']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $user_permission = 1;

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors_reg, "Username is required"); }
  if (empty($userFirstname)) { array_push($errors_reg, "UserFirstname is required"); }
  if (empty($email)) { array_push($errors_reg, "Email is required"); }
  if (empty($civ)) { array_push($errors_reg, "Civ is required"); }
  if (empty($bday)) { array_push($errors_reg, "Bday is required"); }
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

    //$query = "INSERT INTO users (Name, First_name, Mail, psswd, User_permission, User_sex, User_Bday) 
    //      VALUES('$username','$userFirstname', '$email', '$password','$user_permission', '$civ', '$bday')";

    $query = "SELECT AddUser('$username','$userFirstname', '$email', '$password', NULL,'$user_permission', '$civ', '$bday')";

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['user_permission'] = $User_permission;
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
    //$query = "SELECT * FROM users WHERE Mail='$mail' AND psswd='$password'";
    $query = "SELECT * FROM Users WHERE id_usr = Login('$mail', '$password')";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $row = $results->fetch_array(MYSQLI_ASSOC);
      $_SESSION['username'] = $row['Name'];
      $_SESSION['user_permission'] = $row['User_permission'];
      $_SESSION['email'] = $mail;
      $_SESSION['success'] = "You are now logged in";
	  $_SESSION['user_firstname'] = $row['First_name'] ;
	  $_SESSION['id_user'] = $row['id_usr'] ;
	  $_SESSION['phone_number'] = $row['Telephone'] ;
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

//EDIT USER
if (isset($_POST['edit_user'])) {

  //$_SESSION['success'] = "LA";

  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $userFirstname = mysqli_real_escape_string($db, $_POST['userFirstname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $civ = mysqli_real_escape_string($db, $_POST['customer_title']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $userPermission = mysqli_real_escape_string($db, $_POST['userPermission']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors_reg, "Username is required"); }
  if (empty($userFirstname)) { array_push($errors_reg, "UserFirstname is required"); }
  if (empty($email)) { array_push($errors_reg, "Email is required"); }
  if (empty($civ)) { array_push($errors_reg, "Civ is required"); }
  if (empty($bday)) { array_push($errors_reg, "Bday is required"); }
  if (empty($userPermission)) { array_push($errors_reg, "userPermission is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE (Name='$username' AND First_name='$userFirstname' )OR Mail='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  /*if ($user) { // if user exists
    if ($user['Name'] === $username) {
      array_push($errors_reg, "Username already exists");
    }

    if ($user['Mail'] === $email) {
      array_push($errors_reg, "email already exists");
    }
  }*/

  // Finally, register user if there are no errors in the form
  if (count($errors_reg) == 0) {


    $query = "UPDATE users SET Name='$username', First_name='$userFirstname', Mail='$email', User_sex='$civ', User_Bday='$bday', User_permission='$userPermission', Telephone='$number'
    WHERE id_usr = '$id'";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Edit success";
    header('location: userManage.php');
  }
}

// CREATE USER
if (isset($_POST['create_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $userFirstname = mysqli_real_escape_string($db, $_POST['userFirstname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $civ = mysqli_real_escape_string($db, $_POST['customer_title']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $userPermission = mysqli_real_escape_string($db, $_POST['userPermission']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $user_permission = 1;

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors_reg, "Username is required"); }
  if (empty($userFirstname)) { array_push($errors_reg, "UserFirstname is required"); }
  if (empty($email)) { array_push($errors_reg, "Email is required"); }
  if (empty($civ)) { array_push($errors_reg, "Civ is required"); }
  if (empty($bday)) { array_push($errors_reg, "Bday is required"); }
  if (empty($userPermission)) { array_push($errors_reg, "userPermission is required"); }
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

    if ($user['Telephone'] === $number) {
      array_push($errors_reg, "number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors_reg) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database


    $query = "SELECT AddUser('$username','$userFirstname', '$email', '$password', '$number','$userPermission', '$civ', '$bday')";
    mysqli_query($db, $query);
    $_SESSION['success'] = "You are now logged in";
    header('location: userManage.php');
  }
}

// CREATE PRODUCT
if (isset($_POST['create_product'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['productName']);
  $price = mysqli_real_escape_string($db, $_POST['productPrice']);
  $description = mysqli_real_escape_string($db, $_POST['productDescription']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors_reg, "name is required"); }
  if (empty($price)) { array_push($errors_reg, "price is required"); }
  if (empty($description)) { array_push($errors_reg, "description is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM products WHERE Name='name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $product = mysqli_fetch_assoc($result);
  
  if ($product) { // if product exists
    if ($product['Name'] === $name) {
      array_push($errors_reg, "name already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors_reg) == 0) {

    $query = "INSERT INTO products (Name,Description,Price) VALUES ('$name','$description','$price')";
    mysqli_query($db, $query);
    $queryIdProd = "SELECT MAX(id_prod) as MaxId from products LIMIT 1";
    $result = mysqli_query($db, $queryIdProd);
    $idProdArray = mysqli_fetch_assoc($result);
    $idProd = $idProdArray['MaxId'];
    $queryPC = "INSERT INTO  product_category (Product,Category) VALUES ('$idProd','1')";
    mysqli_query($db, $queryPC);
    //$_SESSION['test'] = $idProd;
    header('location: productManage.php');
  }
}

//EDIT PRODUCT
if (isset($_POST['edit_product'])) {


  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['productName']);
  $price = mysqli_real_escape_string($db, $_POST['productPrice']);
  $description = mysqli_real_escape_string($db, $_POST['productDescription']);
    $id = mysqli_real_escape_string($db, $_POST['id']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors_reg, "name is required"); }
  if (empty($price)) { array_push($errors_reg, "price is required"); }
  if (empty($description)) { array_push($errors_reg, "description is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM products WHERE Name='name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $product = mysqli_fetch_assoc($result);


  // Finally, register user if there are no errors in the form
  if (count($errors_reg) == 0) {

    $query = "UPDATE products SET Name='$name', Price='$price', Description='$description'WHERE id_prod = '$id'";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Edit success";
    header('location: productManage.php');
  }
}

?>