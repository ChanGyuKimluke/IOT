<html>
<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"></head>
<body>
<?php
$email = $_POST["email"];

$host = "127.0.0.1";
$user = "root";
$pw = "1234";
$dbName = "test";
$conn = new mysqli($host, $user, $pw, $dbName);

if(mysqli_connect_errno()){
  echo "MySQL 연결 오류:". mysqli_connect_error();
  printf("fail");
  exit();
}else {
  printf("success");
  echo "담독";
}


?>
</body>
</html>

