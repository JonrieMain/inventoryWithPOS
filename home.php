<?php
require('./config/config.php');
session_start();



//check if have a current session
if($_SESSION['activeUser'] == "none" || empty($_SESSION['activeUser'])){
	header("location: index.php");
}


//reasign session
$newActiveUser = $_SESSION['activeUser'];
// Profile Name
$sqlDisplayProfileName = mysqli_query($conn, "SELECT * FROM users WHERE userId = '$newActiveUser'");
$getProfileName = mysqli_fetch_array($sqlDisplayProfileName);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POS | Home</title>
	<!-- Global CSS -->
	<link rel="stylesheet" type="text/css" href="./css/homeGlobal.css">
	<!-- Home content CSS -->
	<link rel="stylesheet" href="./css/home.css">
	<!-- CSS fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<!-- main con home -->
<div class="main">
<i id="bars" class="fa-solid fa-x"></i>


<!-- sidebar -->
<div class="sidebar">
	<h2><i style="margin-right: 10px;" class="fa-solid fa-user"></i><?php echo $getProfileName['profileName'] ?></h2>
	<ul>
		<li id="homeActive"><a href="#"><i class="fa-solid fa-house-user"></i>Home</a></li>


		<li><a href="product.php"><i class="fa-solid fa-bottle-droplet"></i>My Product</a></li>

		<li><a href="sales.php"><i class="fa-solid fa-cart-shopping"></i>Sales</a></li>

		<li><a href="#"><i class="fa-solid fa-hand-holding-heart"></i>Receiving</a></li>

		<li><a href="#"><i class="fa-solid fa-arrow-trend-up"></i>Sales Report</a></li>

		<li><a href="#"><i class="fa-solid fa-users"></i>Employee</a></li>

		<li><a href="#"><i class="fa-solid fa-circle-user"></i>Users</a></li>

		<li><a href="#"><i class="fa-solid fa-gear"></i>Account</a></li>

		<span><i class="fa-solid fa-arrow-right-from-bracket"></i>

		<input type="button" class="logout" value="Sign out">
		</span>
	</ul>
</div>


<!-- home header -->
<div class="header">

	<h1><i class="fa-solid fa-house-user"></i> HOME</h1>

</div>



<!-- home content -->
<div class="homeContent">

<div class="homeBtn"><a href="home.php"><i class="fa-solid fa-house-user"></i>Home</a></div>
<div class="myProductBtn"><a href="product.php"><i class="fa-solid fa-bottle-droplet"></i>My Product</a></div>
<div class="salesBtn"><a href="sales.php"><i class="fa-solid fa-cart-shopping"></i>My Sales</a></div>
<div class="receivingBtn"><a href="#"><i class="fa-solid fa-hand-holding-heart"></i>Receiving</a></div>
<div class="salesReportBtn"><a href="#"><i class="fa-solid fa-arrow-trend-up"></i>Sales Report</a></div>
<div class="addStocksBtn"><a href="#"><i class="fa-solid fa-users"></i>Employee</a></div>
<div class="usersBtn"><a href="#"><i class="fa-solid fa-circle-user"></i>Users</a></div>
<div class="accountBtn"><a href="#"><i class="fa-solid fa-gear"></i>Account Settings</a></div>

</div>





</div>

</body>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Global JS -->
<script type="text/javascript" src="./js/globalJs.js"></script>
</html>

<!-- https://www.youtube.com/watch?v=pk5x_6slIWw -->