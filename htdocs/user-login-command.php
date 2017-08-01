<?php session_start(); ?>
<?php
// $pdo = new PDO('mysql:host=localhost;dbname=airpollution', 'root', '12345678', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));
include 'signup_confirmation/connection/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from test where email = :email";
$pdo = $db->prepare($query);
$pdo->bindValue(':email', $email);
$pdo->execute();
$result = $pdo->fetch();

if(password_verify($password, $result['password']) && $result['state'] == 1)
{
  $_SESSION['email'] = $email;
  ?><meta http-equiv="refresh" content="0;url=http://192.168.33.66/index.php"><?php
}else {
  ?>
  <script type="text/javascript">
    alert("Please Check your E-mail and Password");
    </script>
    <meta http-equiv="refresh" content="0;url=http://192.168.33.66/user_log_in.php"><?php
}

?>
