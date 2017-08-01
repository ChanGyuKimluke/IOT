<?php
include 'signup_confirmation/connection/connect.php';
include 'helper/activate_account_function.php';

$code = generateRandomString();

$email = $_POST["email"];
$password = $_POST["password"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];

$passwordhs = password_hash($password, PASSWORD_DEFAULT);

$query = "insert into user_data(email, password, fname, lname, email_code, email_token, login_state, latitude, longitude) values(:email, :passwordhs, :fname, :lname, :code, null, 0, 0, 0)";

$pdo = $db->prepare($query);
$pdo->bindValue(':email', $email);
$pdo->bindValue(':passwordhs', $passwordhs);
$pdo->bindValue(':fname', $firstname);
$pdo->bindValue(':lname', $lastname);
$pdo->bindValue(':code', $code);
$pdo->execute();

echo 'success';

?>