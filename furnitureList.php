<?php
   
    //Datebase connection
    $server_name = "localhost";
    $user_name = "ismaisaajb";
    $password = "wr8*l=azISW";
    $database = "ismaisaa_test";

    $conn= new mysqli($server_name, $user_name, $password, $database);
    if($conn->connection_error){
        die('Connection failed  :  '.$conn->connection_error);
    }
    else{
        echo "connected succussfully";
    }

    $bedD = $_POST['bedD'];
    $MattressD = $_POST['MattressD'];
    $FridgeD = $_POST['FridgeD'];
    $OvenD = $_POST['OvenD'];
    $WasherD = $_POST['WasherD'];
    $DryerD = $_POST['DryerD'];
    $MicrowaveD = $_POST['MicrowaveD'];
    $ClosetD = $_POST['ClosetD'];
    $SofaD = $_POST['SofaD'];
    $cTableD = $_POST['cTableD'];
    $ChairsD = $_POST['ChairsD'];
    $ACD = $_POST['ACD'];
    $apt = $_POST['apt'];
  
    session_start();
    $tmp = $_SESSION['username'];
    
    //query
    $query="INSERT INTO frunlst ( bedD, MattressD, FridgeD, OvenD, WasherD, DryerD, MicrowaveD, ClosetD, SofaD, cTableD, ChairsD, ACD, apt, email) VALUES ( '$bedD', '$MattressD', '$FridgeD', '$OvenD', '$WasherD', '$DryerD', '$MicrowaveD', '$ClosetD', '$SofaD', '$cTableD', '$ChairsD', '$ACD', '$apt', '$tmp')";  
    
    //if connection was successfull, go to home page
    if ($conn->query($query) == TRUE) {
        header("Location: mainTenant.php");
        
    }else{
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
    
?>