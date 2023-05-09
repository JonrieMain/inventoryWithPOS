<?php
session_start();
//check if have a current session

//disable warning for activeUser
error_reporting(0);

if($_SESSION['activeUser'] == "none" || empty($_SESSION['activeUser'])){
	$_SESSION['active'] = "none";
}else{
	header("location: home.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>POINT OF SALE |BY JONRIE</title>
</head>
<body>

	<div class="main">
		<strong>POINT OF SALE SYSTEM</strong> 

		<marquee direction="left">This Point Of Sale is created by: Jonrie © 2022 Jonrie | Sample Project
		</marquee>

		<!-- login form -->
		<form class="login">
			<h1>Sign In</h1>
			<input type="hidden" name="loginAction" value="loginAction">
			<p style="color: red;" id="loginError"></p>
			<input type="text" placeholder="Username" name="loginUsername">
			<span class="eyeCon">
				<i class="fa-solid fa-eye" id="eye"></i>
				<input type="password" placeholder="Password" name="loginPassword">
			</span>
			<input class="loginSubmit" type="button" value="Sign In" name="loginSubmit">
			<input class="loginButton" type="button" value="Sign Up" id="register">
			<small><a href="">Forgot Password?</a></small>
		</form>

		<!-- register -->
		<form class="register">
			<h1>Sign Up</h1>
			<input id="registerAction" type="hidden" value="registerAction">
			<p class="registerError" style="color: red;font-size: 1.4rem;text-align: center;" class="registerError"></p>
			<input type="text" class="registerProfileName" placeholder="Profile Name" name="registerProfileName">
			<input type="text" class="registerUsername" placeholder="Username" name="registerUsername">
			<input type="password" class="registerPassword" placeholder="Password" name="registerPassword">
			<input type="password" class="registerSecretKey" placeholder="Secret key" name="registerSecretKey">
			<input type="button" value="Sign Up" class="registerSubmit" name="registerSubmit">
			<input type="button" value="Sign In" class="loginShow">
		</form>





	</div>
</body>

<!-- JQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- JS -->
<script type="text/javascript" src="./js/index.js"></script>

</html>
<!-- https://www.canva.com/colors/color-palettes/rosy-flamingo/ -->