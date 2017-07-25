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


	</style>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<script>
function checkinfo(){
			var check = eval(document.info);
			var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

			if(check.email.value==""){
				alert("please, enter your email");
				check.email.value.focus();
				return false;

			}else if (exptext.test(check.email.value)==false) {
				alert("E-mail format is incorrect");
				check.email.value.focus();
				return false;

			}
			if(check.password.value==""||check.passwordcheck.value==""){
				alert("please, enter your password");
				check.password.value.focus();
				check.password.clear();
				return false;
			}

			if(check.password.value.length < 6 || check.passwordcheck.value <6)
			{
				alert("Please enter 6 to 16 digits as a combination of letters, numbers, and special characters(~!@#$%^&*()-_? allow only this).");
				check.password.value.focus();
				check.password.clear();
				return false;
			}

			if(!check.password.value.match(/[a-zA-Z0-9]*[^a-zA-Z0-9\n]+[a-zA-Z0-9]*$/) || !check.passwordcheck.value.match(/[a-zA-Z0-9]*[^a-zA-Z0-9\n]+[a-zA-Z0-9]*$/)){
				alert("Please enter 6 to 16 digits as a combination of letters, numbers, and special characters.");
				check.password.value.focus();
				check.password.clear();
				return false;
			}

			if(check.password.value!=check.passwordcheck.value){
				alert("password and passwordcheck isn't correct");
				check.password.clear();
				check.password.value.focus();
				return false;
			}

}

</script>


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
						<form name="info" method ="post" action ="user_information_command.php">
						<div class="box">
						<dl>
							<dd>
								<label for="email">Email</label>
								<input id="email" type="text" name="email" autofocus required>
								<div id="result"></div>
								<input type="button" value="email check" id="emailcheck"/>
								<script>
									$('#emailcheck').click(function(){
										var check = eval(document.info);
										var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

										if(check.email.value==""){
											alert("please, enter your email");
											check.email.value.focus();
											return false;

										}else if (exptext.test(check.email.value)==false) {
											alert("E-mail format is incorrect");
											check.email.value.focus();
											return false;
										}

										$('#result').html(''); //div 결과값 클리어
										$.ajax({
											url:'emailchecking_command.php',
											type:'POST',
											datatype:'json',
											data:{"email":$('#email').val()},
											success:function(result){
												var obj = jQuery.parseJSON(result);
												if(obj.result == true){
														// alert('success' + JSON.stringify(result));
														$('#result').html('<b style="font-size:15px; color:green">available email</b>');
												}else{
														// alert('fail' + JSON.stringify(result));
														$('#result').html('<b style="font-size:15px; color:red">your email was already found. </b>');
													}
											},
											error: function(result) {
												//alert(result);
												 alert(JSON.stringify(result));
											//	$('#result').html('NO GOOD');
											}
										});
									})
								</script>
							</dd>

							<br>
							<dd>
							<label for="password">Password</label>
							<input id="password" type="password" name="password" required>
							</dd>

							<br>
							<dd>
							<label for="passwordcheck">Confirm password</label>
							<input id="passwordcheck" type="password" name="passwordcheck" required>
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

							<input type="submit" value="submit" onclick="checkinfo()"/>
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


	<!--	<script language="JavaScript">
			setTimeout("history.go(0);", 20000);
		</script> -->

</body>

</html>
