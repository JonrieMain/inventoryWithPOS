<?php
require_once('../config/config.php');

if(isset($_POST['logout'])){//of log out
    if($_POST['logout'] == "Sign out"){
        $_SESSION['activeUser'] = "none";
    }
}else if(isset($_POST['submitAddProduct'])){ //Add Product Form
    if($_POST['submitAddProduct'] == "Add Product"){
        $addProductName = mysqli_real_escape_string($conn, $_POST['addProductName']);

        $addProductType = mysqli_real_escape_string($conn, $_POST['addProductType']);

        $addProductQuantity = mysqli_real_escape_string($conn, $_POST['addProductQuantity']);

        $addProductPrice = mysqli_real_escape_string($conn, $_POST['addProductPrice']);

        //check if valid the data that input
        if(empty($addProductName) || empty($addProductPrice) || empty($addProductQuantity) || empty($addProductType) || $addProductQuantity <= 0 || $addProductPrice <= 0){
            // check if empty
            echo "Invalid output. All field must required/Price and Quantity must >0";
        }else{
         // insert new product
            mysqli_query($conn, "INSERT INTO product(productName,productType,productQuantity,productPrice) VALUES('$addProductName','$addProductType','$addProductQuantity','$addProductPrice')")or die($conn->error());

            echo"Successfully Add";
        }
               
    }


   
}else if(isset($_POST['productEditBtn'])){ //for edit product show existing data
   
    $productIdThrow = $_POST['productId'];

    $productIdThrowUse = mysqli_fetch_array($conn->query("SELECT * FROM product WHERE productId = '$productIdThrow'")) or die($conn->error()); ?>

    

<!-- display html form with existing data -->

<!-- for update exising product -->
<input class="editProductId" type="hidden" value="<?php echo $productIdThrowUse['productId'] ?>">


<i id="closeEditForm" onClick="closeEditForm()" class="fa-solid fa-x"></i>
<h1>Edit Product</h1>

<p class="editFormError"></p>

<label for="productName">Product Name</label>
<input autocapitalize="words" name="editProductName" type="text" placeholder="Product Name" value="<?php echo $productIdThrowUse['productName']; ?>">


<label for="productType">Product Type</label>
<input autocapitalize="words" name="editProductType" type="text" placeholder="Product Type" value="<?php echo $productIdThrowUse['productType']; ?>">


<label for="productQuantity">Product Quantity</label>
<input name="editProductQuantity" type="number" placeholder="Product Quantity" value="<?php echo $productIdThrowUse['productQuantity']; ?>">


<label for="productPrice">Product Price</label>
<input name="editProductPrice" type="number" placeholder="Product Price" value="<?php echo $productIdThrowUse['productPrice']; ?>">


<input type="button" onClick="updateProductInfo()" value="Update" class="submitEditProduct">
   


<?php

}else if(isset($_POST['updateProductInfoBtn'])){
   
    $editProductId = $conn->real_escape_string($_POST['editProductId']);
    
    $editProductName = $conn->real_escape_string($_POST['editProductName']);

    $editProductType = $conn->real_escape_string($_POST['editProductType']);

    $editProductQuantity = $conn->real_escape_string($_POST['editProductQuantity']);
    
    $editProductPrice = $conn->real_escape_string($_POST['editProductPrice']);

    if(empty($editProductName) || empty($editProductPrice) || empty($editProductType) || $editProductQuantity < 0 || $editProductPrice < 0){
        //check if valid
        echo"Error input. All field must required & Quantity & Price >= 0";

    }else{
        //update
        echo"Successfully Update! Please wait..";

        $conn->query("UPDATE product SET productName='$editProductName',productType='$editProductType',
        productQuantity='$editProductQuantity',
        productPrice='$editProductPrice' WHERE productId='$editProductId'")or die($conn->error());
    }




}else if(isset($_POST['deleteYes'])){ //delete product

    $deleteProductId = $conn->real_escape_string($_POST['deleteProductId']);

    $deleteProductIdUse = $conn->query("DELETE FROM product WHERE productId = '$deleteProductId'");

}else if(isset($_POST['searchProductValue'])){ //for search product
    $searchProductValue = $_POST['searchProductValue'];
    if(empty($searchProductValue) || $searchProductValue == ""){
        //select all from db(default)
        $selectAllFromDb = mysqli_query($conn, "SELECT * FROM product") or die($conn->error());
        
        ?>

        <tr>
                    <th>Product Name</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                
                <!-- loop to display productList -->
                <?php while($newSelectAllFromDb = mysqli_fetch_array($selectAllFromDb)){ ?>
                    <tr>

                        <td><?php echo $newSelectAllFromDb['productName'] ?></td>
                        <td><?php echo $newSelectAllFromDb['productType'] ?></td>
                        <td><?php echo $newSelectAllFromDb['productQuantity'] ?></td>
                        <td>₱<?php echo $newSelectAllFromDb['productPrice'] ?></td>
                        <td class="productListAction">
                            <!-- for update and delete ID key -->
                            <input type="hidden" class="idEdit" value="<?php echo $newSelectAllFromDb['productId'] ?>">
                            <!-- ---------------------------- -->
                            <!-- for delete show name -->
                            
                            <input type="hidden" value="<?php echo $newSelectAllFromDb['productName']; ?>">

                            <!-- ------------- -->


                            <button onclick="productListEditFunc(); editProductShow();" class="productListEdit">Edit</button>
                            <button class="productListDelete" onclick="showProductListDeleteFunc();productListDeleteFunc();">Delete</button>
                        </td>
                    </tr>
                    <script>productListEditFunc(); productListDeleteFunc();</script>
                <?php } ?>

        
                <?php


    }else{

        $searchProductValueNotEmpty = mysqli_query($conn, "SELECT * FROM product WHERE productName LIKE '%$searchProductValue%'") or die($conn->error());


        if(mysqli_num_rows($searchProductValueNotEmpty) < 1){
            echo"No result";
        }else{
            ?>



<tr>
                    <th>Product Name</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                
                <!-- loop to display productList -->
                <?php while($newSearchProductValueNotEmpty = mysqli_fetch_array($searchProductValueNotEmpty)){ ?>
                    <tr>

                        <td><?php echo $newSearchProductValueNotEmpty['productName'] ?></td>
                        <td><?php echo $newSearchProductValueNotEmpty['productType'] ?></td>
                        <td><?php echo $newSearchProductValueNotEmpty['productQuantity'] ?></td>
                        <td>₱<?php echo $newSearchProductValueNotEmpty['productPrice'] ?></td>
                        <td class="productListAction">
                            <!-- for update and delete ID key -->
                            <input type="hidden" class="idEdit" value="<?php echo $newSearchProductValueNotEmpty['productId'] ?>">
                            <!-- ---------------------------- -->
                            <!-- for delete show name -->
                            
                            <input type="hidden" value="<?php echo $newSearchProductValueNotEmpty['productName']; ?>">

                            <!-- ------------- -->


                            <button onclick="productListEditFunc(); editProductShow();" class="productListEdit">Edit</button>
                            <button onclick="productListDeleteFunc(); showProductListDeleteFunc();" class="productListDelete">Delete</button>
                        </td>
                    </tr>
                    <script>productListEditFunc(); productListDeleteFunc();</script>
                <?php } ?>




            <?php
        }

       








      


    }
} 




?>