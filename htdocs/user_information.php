<!DOCTYPE HTML>
<html>
	<head>
		<title>QI B team Homepage</title>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style type="text/css">
		html, body {
		  /* height: 100%;  IE에서 지도위치가 브라우저 하단에 고정되는 현상 발생해서 삭제 (2013-05-16)  */
		  margin: 0;
		  padding: 0;
		}

		</style>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>QI Airpollution Center</strong> by B team</a>
									<ul class="icons">
										<li><a href="https://twitter.com" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="https://www.facebook.com" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="https://www.snapchat.com" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="https://www.instagram.com" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="https://medium.com" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h3>User Information</h3>
										</header>

                    <?php

                     $host = "192.168.33.66";
                     $user = "root";
                     $pw = "12345678";
                     $dbName = "airpollution";
                     $conn = new mysqli($host, $user, $pw, $dbName);

                    if(mysqli_connect_errno()){
                      echo "MySQL 연결 오류:". mysqli_connect_error();
                      printf("fail");
                      exit();
                    }else {
                      // printf("success");
                    }

                    mysql_query($conn, "set session character_set_connection=utf8;");
                    mysql_query($conn, "set session character_set_results=utf8;");
                    mysql_query($conn, "set session character_set_client=utf8;");

                     $re=mysqli_query($conn, "select * from person");
                     echo "
                          <table border='1'>
                          <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Age</th>
                          </tr>";
                     while($row=mysqli_fetch_array($re)){
                       echo "<br>";
                       echo "<tr>";
                       echo "<td>".$row[0]."&nbsp"."</td>";
                       echo "<td>". $row[1]."&nbsp"."</td>";
                       echo "<td>". $row[2]."&nbsp"."</td>";
                       echo "</tr>";
                     }
                      echo "</table>";

                     mysqli_close($conn);
                     ?>

									</div>
								</section>
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
                    <li>
      							<span class="opener">Air pollution History</span>
      							<ul>
      								<li><a href="airpollution.html">CO</a></li>
      								<li><a href="#">CO2</a></li>
      								<li><a href="#">SO2</a></li>
      								<li><a href="#">NO2</a></li>
      								<li><a href="#">O3</a></li>
      								<li><a href="#">PM2.5</a></li>
      								<li><a href="#">Temperature</a></li>
      								<li><a href="#">humidity</a></li>
      							</ul>
      						</li>

      						<li>
      						<span class="opener">HeartBeat History</span>
      						<ul>
      							<li><a href="basic.html">Heart rate</a></li>
      							<li><a href="#">Breathing rate</a></li>
      						</ul>
      					</li>
      							<li><a href="user_information.php">Users Information</a></li>
									</ul>
								</nav>


							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">softeran@gmail.com</a></li>
										<li class="fa-phone">(404)271-3932</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
