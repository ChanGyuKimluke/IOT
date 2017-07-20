<!DOCTYPE HTML>
<html>
<head>
	<title>QI B team Homepage</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<meta http-equiv="content-type" content="text/html"; charset="utf-8" />
	<style type="text/css">
		html,
		body {
			/* height: 100%;  IE에서 지도위치가 브라우저 하단에 고정되는 현상 발생해서 삭제 (2013-05-16)  */
			margin: 0;
			padding: 0;
		}

		#map-canvas,
		#map_canvas {
			width: 100%;
			/* 구글 지도 넓이 */
			height: 800px;
			/* 구글 지도 높이 */
			font-size: 12px;
		}

		@media print {
			html,
			body {
				height: auto;
			}
			#map_canvas {
				height: 650px;
			}
		}
		#relative
		{
			width:auto;
			height:auto;
			position:relative;
			float:right;
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
					<section id="banner">
							
						<div class="content">
						<form method ="post" action ="user_information_command.php">
						<div class="box">
						<dl>
							<dd>
							<label for="email">Email</label>
							<input id="email" type="text" name="email" autofocus required>
							</dd>
							
							<br>
							<dd>
							<label for="password">Password</label>
							<input id="password" type="password" name="password" required>
							</dd>
							
							<br>
							<dd>
							<label for="password">Password check</label>
							<input id="password" type="password" name="password" required>
							</dd>
							
							<br>
							<dd>
							<label for="firstname">FirstName</label>
							<input id="firstname" type="text" name="firstname" autofocus required>
							</dd>
							
							<br>
							<dd>
							<label for="lastname">LastName</label>
							<input id="lastname" type="text" name="lastname" autofocus required>
							</dd>
							
							<br>
							<dd>
							<!-- birthday -->
							</dd>
							
							<br>
							<dd>
			
							<input type="submit" value="submit"/>
							
							<input type="button" value="cancel" onclick="javascript:history.go(-1)"/>
							
							</dd>
							
						</dl>
							</div>
							</form>
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
							<li class="fa-home">1234 Somewhere Road #8254<br /> Nashville, TN 00000-0000</li>
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

		<script language="JavaScript">
			setTimeout("history.go(0);", 20000);
		</script>

</body>

</html>
