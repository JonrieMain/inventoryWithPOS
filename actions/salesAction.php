<?php

require_once('../config/config.php');

if(isset($_POST['buyerName'])){
    $buyerName = $conn->real_escape_string($_POST['buyerName']);
    $salesArr = $_POST['salesProduct'];
    

    if(empty($buyerName)){
        echo"Error name is empty";
    }else{
        $date = date("Y/m/d");
        $insertName = mysqli_query($conn, "INSERT INTO sales(buyerName,dateNow) VALUES('$buyerName','$date')") or die($conn->error());
        $getId = mysqli_insert_id($conn);
        echo"Name inserted";
    }

    foreach($salesArr as $salesArrs){
        
        $salesProduct = $salesArrs['select'];
        $quantitySale = $salesArrs['quantitySale'];
        $priceSale = $salesArrs['priceSale'];

        if(empty($salesProduct) || empty($quantitySale) || empty($priceSale)){
            echo"Error missing data. Please try again";
        }else{
            $insertSales = mysqli_query($conn,"INSERT INTO salesProduct(salesId,product,quantity,price) VALUES('$getId','$salesProduct','$quantitySale','$priceSale')");
            echo"Product sales inserted";
        }

    }

}

?>