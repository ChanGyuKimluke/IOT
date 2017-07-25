<html>
<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"></head>
<body>
<?php
session_start();

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
  // printf("success");
  // echo "담독";

}

mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
// mysqli_query($conn, "CREATE TABLE test(email varchar(30))");
// mysqli_query($conn, "insert into test(email) values('softeran@gmail.com')");
$re=mysqli_query($conn, "select * from test where email= '$email';");
// $dupemailcheck = mysqli_query($conn, "select * from test where email=$email");
$count = mysqli_num_rows($re);
// echo "string";
print_r ($count);
if($count ==0){
  echo  "<script>
          alert('It's available email');
          location.href='../user_sign_up.php';
          </script>";
}else{
  echo  "<script>
          alert('your email is now duplicated');
          location.href='../user_sign_up.php';
          </script>";
}

// echo"<script>alert('checked your email');
//      location.href='../user_sign_up.php';
//       </script>";
?>
</body>
</html>
