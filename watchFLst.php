<?php

 //Datebase connection
 $server_name = "localhost";
 $user_name = "ismaisaajb";
 $password = "wr8*l=azISW";
 $database = "ismaisaa_test";

 $conn= new mysqli($server_name, $user_name, $password, $database);

 session_start();
 $tmp = $_SESSION['username'];

//query- get the furniture list details
 $query="select * from frunlst where email='$tmp'"; 
 $res = mysqli_query($conn,$query);
 $rows = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>furniture list</title>
    <link rel="stylesheet" href="basic.css">
    <link rel="stylesheet" href="watch.css">
    <link rel="shortcut icon" href="photos/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="mainColor">
        <span> 
        <!--go back button-->
        <i onclick="history.back()" class="fa fa-angle-double-left"></i>
        </span>
        <p class="slogan1">Tenant management</p>
    </header>

    

    <main>
        <!-- watch contract button-->
      <a href="watchCon.php"><button class="fbtn border">View contract</button></a>
      
      <p class="p">Bed: <?php echo $rows['bedD']; ?></p>
      <hr>
      <p>Mattress: <?php echo $rows['MattressD']; ?></p>
      <hr>
      <p>Fridge: <?php echo $rows['FridgeD']; ?></p>
      <hr>
      <p>Oven: <?php echo $rows['OvenD']; ?></p>
      <hr>
      <p>Washer: <?php echo $rows['WasherD']; ?></p>
      <hr>
      <p>Clothes Dryer: <?php echo $rows['DryerD']; ?></p>
      <hr>
      <p>Microwave: <?php echo $rows['MicrowaveD']; ?></p>
      <hr>
      <p>Closet: <?php echo $rows['ClosetD']; ?></p>
      <hr>
      <p>Sofa: <?php echo $rows['SofaD']; ?></p>
      <hr>
      <p>Coffe Table: <?php echo $rows['cTableD']; ?></p>
      <hr>
      <p>Chairs: <?php echo $rows['ChairsD']; ?></p>
      <hr>
      <p>Air Conditioner: <?php echo $rows['ACD']; ?></p>
      <hr>
      <p>Apartment's description: <?php echo $rows['apt']; ?></p>

    </main>
</body>
</html>