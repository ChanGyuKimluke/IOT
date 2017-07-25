<?php session_start(); ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=airpollution', 'root', '12345678', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from test1 where email = :email";
$ppdo = $pdo->prepare($query);
$ppdo->bindValue(':email', $email);
$ppdo->execute();
$result = $ppdo->fetch();

echo "email : ".$email." </br>";
echo "password : ".$password." </br>";

if(password_verify($password, $result['password']))
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
