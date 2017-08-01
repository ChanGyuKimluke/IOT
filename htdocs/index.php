<?php session_start(); ?>
<!DOCTYPE HTML>
<?php
if(!isset($_SESSION['email']))
{
?><meta http-equiv="refresh" content="0;url=http://192.168.33.66/user_log_in.php">
<?php
    exit;
}
?>
<html>
<head>
	<title>QI B team Homepage</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
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
			height: 600px;
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
						<a href="index.php" class="logo"><strong>QI Airpollution Center</strong> by B team</a>
						<ul class="icons">
							<li><a href="https://twitter.com" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.snapchat.com" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
							<li><a href="https://www.instagram.com" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://medium.com" class="icon fa-medium"><span class="label">Medium</span></a></li>
						</ul>
					</header>
					<br>
					<div id="relative">
					<form method="post" action="user_log_out.php">
						<input type="submit" value="log-out"	/>
					</form>
					</div>
					</br>

					<!-- Banner -->
					<section id="banner">

						<div class="content">

							<header>
								<h3>Google Map</h3>
							</header>

							<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=en&key=AIzaSyCyJiE-pUvvyQil2JxwIPl-7NGl_6D4_yk&callback=initialize"></script>
							<script>
								function initialize() {

									var Y_point = 32.885868; // lat 값
									var X_point = -117.242806; // lng 값

									var zoomLevel = 17; // 첫 로딩시 보일 지도의 확대 레벨
									var markerMaxWidth = 300; // 마커를 클릭했을때 나타나는 말풍선의 최대 크기


									var myLatlng = new google.maps.LatLng(Y_point, X_point);
									var mapOptions = {
										zoom: zoomLevel,
										center: myLatlng,
										mapTypeId: google.maps.MapTypeId.ROADMAP
									}

									var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);


									var marker = new google.maps.Marker({
										position: myLatlng,
										map: map,
										draggable: true,
										animation: google.maps.Animation.DROP
									});

									var circle = new google.maps.Circle({
										center: myLatlng,
										radius: 100,
										strokeColor: "#0000FF",
										strokeOpacity: 0.8,
										strokeWeight: 2,
										center: myLatlng,
										fillColor: "#0000FF",
										fillOpacity: 0.4,
										draggable: false
									});
									circle.setMap(map);

									var infowindow = new google.maps.InfoWindow({
										content: contentString,
										maxWidth: markerMaxWidth
									});

									infowindow.open(map, marker);

									google.maps.event.addListener(marker, 'click', function() {
										infowindow.open(map, marker);

									});

								}

								google.maps.event.addDomListener(window, 'load', initialize);
							</script>

							<table cellpadding="0" cellspacing="3" bgcolor="#f4f4f4">
								<tr>
									<!-- <td bgcolor="#ffffff"> -->
										<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
											<tr>
												<!-- <td bgcolor="#ffffff"> -->
													<table width="100%" cellpadding="3" cellspacing="1" bgcolor="#eeeeee">
														<tr>
															<!-- <td bgcolor="#ffffff"> -->
																<div id="map_canvas" style="border:1px solid #ccc; margin:0 0 0px 0;"></div>
															<!-- </td> -->
														</tr>
													</table>
												<!-- </td> -->
											</tr>
										</table>
									<!-- </td> -->
								</tr>
							</table>
							<!-- <ul class="actions">
											<li><a href="#" class="button big">Learn More</a></li>
										</ul> -->
						</div>
					</section>

				<!-- Section -->
					<section>
						<header class="major">
							<h2>데이터들</h2>
						</header>
						<div class="posts">

							<article>
								<h3>데이터1</h3>
								<div class="box">
									<input type="text" name="data1" value="" required />
								</div>
								<ul class="actions">
									<li><a href="#" class="button">More</a></li>
								</ul>
							</article>

							<article>
								<h3>데이터 2</h3>
								<div class="box">
									<input type="text" name="data2" value="데미지" required />
								</div>
								<ul class="actions">
									<li><a href="#" class="button">More</a></li>
								</ul>
							</article>

							<article>
								<h3>데이터 3</h3>
								<div class="box">
									<input type="text" name="data3" value="" required />
								</div>
								<ul class="actions">
									<li><a href="#" class="button">More</a></li>
								</ul>
							</article>

							<article>
								<h3>데이터 4</h3>
								<div class="box">
									<input type="text" name="data4" value="" required />
								</div>
								<ul class="actions">
									<li><a href="#" class="button">More</a></li>
								</ul>
							</article>

							<article>
								<h3>데이터 5</h3>
								<div class="box">
									<input type="text" name="data5" value="" required />
								</div>
								<ul class="actions">
									<li><a href="#" class="button">More</a></li>
								</ul>
							</article>

							<article>
								<h3>데이터 6</h3>
								<div class="box">
									<input type="text" name="data6" value="" required />
								</div>
								<ul class="actions">
								<li><a href="#" class="button">More</a></li>
								</ul>
							</article>
						</div>
					</section>
				</div>
			</div>



			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">

					<!-- Search -->
					<!-- <section id="search" class="alt">
						<form method="post" action="#">
							<input type="text" name="query" id="query" placeholder="Search" />
						</form>
					</section> -->

					<!-- Menu -->
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<ul>
							<li>
							<span class="opener">Air pollution History</span>
							<ul>
								<li><a href="co_data.php">CO</a></li>
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

		<!-- <script language="JavaScript">
			setTimeout("history.go(0);", 20000);
		</script>
 -->
</body>

</html>
