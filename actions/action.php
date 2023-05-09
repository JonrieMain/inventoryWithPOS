<?php
//require database connection
require('../config/config.php');
session_start();

//check actions
if(isset($_POST['loginAction'])){//if login
    if($_POST['loginAction'] == "loginAction"){
        //get the value of login form
        $loginUsername = mysqli_real_escape_string($conn,$_POST['loginUsername']);
        $loginPassword = mysqli_real_escape_string($conn,$_POST['loginPassword']);
        //query check
        $sqlCheckLogin = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$loginUsername' AND password = '$loginPassword'") or die($conn->error());
        if(mysqli_num_rows($sqlCheckLogin) > 0 ){

            // get info of user save in session
            $getInfo = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE username = '$loginUsername'"));
            $_SESSION['activeUser'] = $getInfo['userId'];

            // redirect to home
            echo"<script>window.location.href='home.php'</script>";
        }else{
            echo "Incorrect username or password";
        }
}      
}else if(isset($_POST['registerAction'])){ //if register
    if($_POST['registerAction'] == "registerAction"){
        //get the value of register form
        $registerProfileName = mysqli_real_escape_string($conn, $_POST['registerProfileName']);
        $registerUsername = mysqli_real_escape_string($conn, $_POST['registerUsername']);
        $registerPassword = mysqli_real_escape_string($conn, $_POST['registerPassword']);
        $registerSecretKey = mysqli_real_escape_string($conn, $_POST['registerSecretKey']);

      //check if empty
        if(empty($registerProfileName) || empty($registerUsername) || empty($registerPassword) || empty($registerSecretKey)){
            echo"Error all field must required";
        }else{
            //check if username is already exist or else register will be success
        $sqlCheckRegister = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$registerUsername'") or die($conn->error());
        if(mysqli_num_rows($sqlCheckRegister) >= 1){
            echo"Error user already exist. Use other username";
        }else{
            $sqlRegisterInsert = mysqli_query($conn, "INSERT INTO users(profileName,username,password,secretKey) VALUES('$registerProfileName','$registerUsername','$registerPassword','$registerSecretKey')");
            echo"Successfully Register. Redirecting...";
        }
        }

    }

    
}else if(isset($_POST['logout'])){//logout make session invalid
    unset($_SESSION['activeUser']);
}//end if

       
    





    







?>