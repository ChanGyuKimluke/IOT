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

		#emailcheck{
        background: #0000ff !important;
        color: #ffffff !important;
        opacity: 0.2;
      }

      #emailcheck:hover
      {
        opacity: 1.0;
      }


	</style>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<script type="text/javascript">
function checkinfo(){
			var check = eval(document.info);
			var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

			if(check.email.value==""){
				alert("please, enter your email");
				check.email.value.focus();
				return false;

			}
			if (exptext.test(check.email.value)==false) {
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
			if(check.firstname.value==""){
				alert("please, enter your FirstName");
				check.firstname.value.focus();
				return false;

			}
			if(check.lastname.value==""){
				alert("please, enter your LastName");
				check.lastname.value.focus();
				return false;

			}
			if(check.password.value.match(/[a-zA-Z0-9]*[^a-zA-Z0-9\n]+[a-zA-Z0-9]*$/) && check.passwordcheck.value.match(/[a-zA-Z0-9]*[^a-zA-Z0-9\n]+[a-zA-Z0-9]*$/){

				check.submit();
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
						<form name="info" method ="post" action ="/slim-api/user-info">
						<!-- user_information_command.php -->

						<div class="box">
						<dl>
							<dd>
								<label for="email">Email</label>
								<input id="email" type="text" name="email" placeholder="Enter your E-mail" autofocus required>
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
											url:'emailchecking-command.php',
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
							<input id="password" type="password" name="password" placeholder="Enter your Password" required>
							</dd>

							<br>
							<dd>
							<label for="passwordcheck">Confirm password</label>
							<input id="passwordcheck" type="password" name="passwordcheck" placeholder="Confirm Password" required>
							</dd>

							<br>
							<dd>

							<label for="firstname">First name</label>
							<input id="firstname" type="text" name="firstname" placeholder="Enter your FirstName" autofocus required>
							</dd>

							<br>
							<dd>
							<label for="lastname">Last name</label>
							<input id="lastname" type="text" name="lastname" placeholder="Enter your LastName" autofocus required>
							</dd>

							<br>
							<dd>
							<!-- birthday -->
							</dd>

							<br>
							<dd>

							<input type="submit" id="emailcheck" value="Create Account" name="create_account" onclick="checkinfo();" />
							<input type="button" id="emailcheck" value="cancel" onclick="javascript:history.go(-1)"/>

							</dd>

						</dl>
							</div>
							</form>
						</div>
					</section>

				</div>
			</div>


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
