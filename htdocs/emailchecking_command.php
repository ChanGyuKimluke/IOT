<?php

$pdo = new PDO('mysql:host=localhost;dbname=airpollution', 'root', '12345678', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));

$email = $_POST['email'];

$query = "select * from test1 where email = :email";

$ppdo = $pdo->prepare($query);

$ppdo->bindValue(':email', $email);

$ppdo->execute();

$result = $ppdo->fetch();

if($result == null){
  // $msg = "it's available email.";
  echo json_encode(array('result'=>true));
  // echo json_encode(array('result'=>true,'emailmsg'=>$msg));
}else{
  // $msg = "your email was already found";
  echo json_encode(array('result'=>false));
}

?>
