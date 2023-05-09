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


error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POS | Sales</title>
	<!-- Global CSS -->
	<link rel="stylesheet" type="text/css" href="./css/homeGlobal.css">
	<!-- sales content CSS -->
	<link rel="stylesheet" href="./css/sales.css">
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


				<li><a href="product.php"><i class="fa-solid fa-bottle-droplet"></i>My Product</a></li>

				<li id="salesActive"><a href="#"><i class="fa-solid fa-cart-shopping"></i>Sales</a></li>

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

			<h1><i class="fa-solid fa-cart-shopping"></i> SALES</h1>

		</div>


		<div class="addsales hide">
    <button><i class="fa-solid fa-plus"></i> Add Sales</button></div>


        <!-- sales content -->
		<div class="salesContent">


				
				<?php
		
				// get sales table
					$displaySales = mysqli_query($conn, "SELECT s.id, ");
				?>
				<!-- loop -->
			<?php while($getDis = $displaySales->fetch_array()){?>
            <div class="salesList">
                    <div class="salesInfo">
                            <h3><?php echo $getDis['buyerName']; ?></h3>

                            <p>Sale Id: <?php echo $getDis['salesId']; ?></p>

                            <p>Date: <?php echo $getDis['dateNow']; ?></p>
                    </div>


					
                    <div class="salesProduct">
					
					<?php
						 ?>
                       	 <span>
                                <div>
                                    <td><?php echo $getProd['product']; ?> x<span>4</span></td>
                                    <td>₱114</td>
                                </div>
						
                            </span>

                            <span class="action">
                                <button>Print</button>
                                <button>Delete</button>
                            </span>
                    </div>
					
                    
                    <span class="total">Total: ₱114</span>
                    
                </div>

					<?php }?>



                </div>






		<!-- add Sales form -->
		<div class="addSalesCon">

		<form class="addSalesForm">
			<label for="nameSale">Name</label>
			<input type="text" name="nameSale" class="nameSale" placeholder="Buyer Name">
			
			

			
		<?php
			$getProductList = $conn->query("SELECT * FROM product");
		?>



			<div class="productSales" id="productSales">
				

				<label for="select">Product</label>
				<select class="select" name="select" id="select">
					<?php while($useGetProductList = $getProductList->fetch_array()){?>
					<option><?php echo $useGetProductList['productName'];?></option>
						<?php }?>
				</select>

				<label for="quantitySale">Quantity</label>
				<input type="number" name="quantitySale" class="quantitySale">
				
				<label for="priceSale">Price</label>
				<input type="number" name="priceSale" class="priceSale">
 					<hr>
			</div>




		</form>
		
		<button class="add" id="add">Add</button>
	<button class="submitSale">Submit</button>
	

		</div>







		





	</div>

</body>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Global JS -->
<script type="text/javascript" src="./js/globalJs.js"></script>

<!-- sales js -->
<script type="text/javascript" src="./js/sales.js"></script>

</html>

<!-- https://www.youtube.com/watch?v=pk5x_6slIWw -->