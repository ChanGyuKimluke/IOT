<html>
<body>
<?php
echo "Mysql 연결 테스트<br>";
echo "string";
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

$result = mysqli_query($conn, 'select version() as version');
$data = mysqli_fetch_array($result);
print_r	($data);
echo $data['version'];

mysqli_close($db);
?>
<html>
<body>
