<?php
include 'signup_confirmation/connection/connect.php';

$code = $_GET['code'];

$query = "select * from user_data where email_code = :code";
$pdo = $db->prepare($query);
$pdo->bindValue(':code', $code);
$pdo->execute();
$result = $pdo->fetch();

if($result == null){

}else{
 	$state = 1;
 	$query = "update user_data set login_state = :state";
 	$pdo = $db->prepare($query);
	$pdo->bindValue(':state', $state);
	$pdo->execute();

	echo "<script>
        alert('you can log-in now!');
        location.replace('./user_log_in.php');
       </script>";
}

?>