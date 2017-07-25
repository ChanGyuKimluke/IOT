<?php

echo $_POST['email'];
echo $_POST['password'];
echo $_POST['passwordcheck'];
echo $_POST['firstname'];
echo $_POST['lastname'];

$email = $_POST["email"];
$password = $_POST["password"];
$passwordcheck = $_POST["passwordcheck"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

$passwordhs = password_hash($password, PASSWORD_DEFAULT);

$pdo = new PDO('mysql:host=localhost;dbname=airpollution', 'root', '12345678', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));

$query = "insert into test1(email, password) values(:email, :passwordhs)";

$ppdo = $pdo->prepare($query);
$ppdo->bindValue(':email', $email);
$ppdo->bindValue(':passwordhs', $passwordhs);
$ppdo->execute();

echo "<script>
        alert('welcome our homepage');
        location.replace('./index.php');
        </script>";

?>
