<?php
require('./config/config.php');
session_start();





//check if have a current session
if($_SESSION['activeUser'] == "none" || empty($_SESSION['activeUser'])){
	header("location: index.php");
}


//reasign session for profileName display
$newActiveUser = $_SESSION['activeUser'];
// Profile Name
$sqlDisplayProfileName = mysqli_query($conn, "SELECT * FROM users WHERE userId = '$newActiveUser'");
$getProfileName = mysqli_fetch_array($sqlDisplayProfileName);


//Select all product
$sqlQueryProductList  = mysqli_query($conn, "SELECT * FROM product ORDER BY productQuantity ASC");









?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POS | Product</title>
	<!-- Global CSS -->
	<link rel="stylesheet" type="text/css" href="./css/homeGlobal.css">
	<!-- product content CSS -->
	<link rel="stylesheet" href="./css/product.css">
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
				<li><a href="home.php"><i class="fa-solid fa-house-user"></i>Home</a></li>


				<li id="productActive"><a href="product.php"><i class="fa-solid fa-bottle-droplet"></i>My Product</a></li>

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

			<h1><i class="fa-solid fa-bottle-droplet"></i> PRODUCT</h1>

		</div>



		<!-- product content -->
		<div class="productContent">

			<div class="addProduct hide"><button><i class="fa-solid fa-plus"></i> Add Product</button></div>


			<span class="search">
				<input type="search" id="searchProduct" placeholder="search product">
			</span>


			<table class="productList">
				<tr>
					<th>Product Name</th>
					<th>Type</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				
				<!-- loop to display productList -->
				<?php while($newSqlQueryProductList = mysqli_fetch_array($sqlQueryProductList)){ ?>
					<tr>

						<td><?php echo $newSqlQueryProductList['productName'] ?></td>
						<td><?php echo $newSqlQueryProductList['productType'] ?></td>
						<td><?php echo $newSqlQueryProductList['productQuantity'] ?></td>
						<td>₱<?php echo $newSqlQueryProductList['productPrice'] ?></td>
						<td class="productListAction">
							<!-- for update and delete ID key -->
							<input type="hidden" class="idEdit" value="<?php echo $newSqlQueryProductList['productId'] ?>">
							<!-- ---------------------------- -->
							<!-- for delete show name -->
							
							<input type="hidden" value="<?php echo $newSqlQueryProductList['productName']; ?>">

							<!-- ------------- -->


							<button class="productListEdit" onclick="productListEditFunc(); editProductShow();">Edit</button>

							<button onclick="productListDeleteFunc(); showProductListDeleteFunc();" class="productListDelete">Delete</button>
						</td>
					</tr>
				<?php } ?>
			</table>

		</div>


		<!-- addProduct form(float) -->
		<form class="addProductForm">
			<i id="closeAddProductForm" class="fa-solid fa-x"></i>
			<h1>Add Product</h1>
			<p class="addProductFormError"></p>
			<label for="productName">Product Name</label>
			<input autocapitalize="words" name="addProductName" type="text" placeholder="Product Name">

			<label for="productType">Product Type</label>
			<input autocapitalize="words" name="addProductType" type="text" placeholder="Product Type">

			<label for="productQuantity">Product Quantity</label>
			<input name="addProductQuantity" type="number" placeholder="Product Quantity">

			<label for="productPrice">Product Price</label>
			<input name="addProductPrice" type="number" placeholder="Product Price">

			<input type="button" value="Add Product" class="submitAddProduct" onClick="submitAddProduct()">
		</form>




		
		<!-- edit product form(float) -->
		<form class="editProductForm">
			
			<h1>Click again <i class="fa-solid fa-hand-pointer"></i></h1>

		</form>


		<!-- delete product(float) -->
		<div class="deleteConfirmation">
			<h4 class="showDelete"></h4>
			<span>
				<button class="deleteYes">Yes</button>
				<button onClick="deleteNo()" class="deleteNo">No</button>
			</span>
		</div>





	</div>

</body>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Global JS -->
<script type="text/javascript" src="./js/globalJs.js"></script>

<!-- product js -->
<script type="text/javascript" src="./js/product.js"></script>

</html>

<!-- https://www.youtube.com/watch?v=pk5x_6slIWw -->