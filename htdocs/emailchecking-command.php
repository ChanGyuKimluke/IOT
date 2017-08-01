<?php
include 'signup_confirmation/connection/connect.php';
// require 'vendor/autoload.php';

$email = $_POST['email'];

$query = "select * from user_data where email = :email";
$pdo = $db->prepare($query);
$pdo->bindValue(':email', $email);
$pdo->execute();
$result = $pdo->fetch();

if($result == null){
   // $msg = "it's available email.";
  echo json_encode(array('result'=>true));
  // echo json_encode(array('result'=>true,'emailmsg'=>$msg));
}else{
  // $msg = "your email was already found";
  echo json_encode(array('result'=>false));
}

?>

