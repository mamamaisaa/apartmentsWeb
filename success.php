<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
    <link rel="stylesheet" href="basic.css">
    <link rel="stylesheet" href="wrong.css">
    <link rel="shortcut icon" href="photos/icon.png" />
</head>
<?php
    $server_name = "localhost";
    $user_name = "ismaisaajb";
    $password = "wr8*l=azISW";
    $database = "ismaisaa_test";

    mysql_connect('localhost','ismaisaajb','wr8*l=azISW'); 
    mysql_select_db('ismaisaa_test'); 
    $conn= new mysqli($server_name, $user_name, $password, $database);
    
    session_start();
    $tmp = $_SESSION['username'];
    $que="select * from Sign_up where email='$tmp'";
    $res=mysqli_query($conn,$que);
    $row=mysqli_fetch_assoc($res);
    
    ?>
<body>
    <header class="mainColor">
        <p class="slogan1">Tenant management</p>
    </header>

   <main>
      <img class="pic" src="photos/opsa.png" alt="success"> <br>
      <?php
	   if($row['role']=='tenant'){
	       ?>
            <!--go back button-->
            <a href="mainTenant.php" class="aa">Click Here To Return To Home Page </a> <br>
            <?php 
        }
        else if($row['role']=='owner'){
        ?> 
        <!--go back button-->
        <a href="mainOwner.php" class="aa">Click Here To Return To Home Page</a> <br>
        <?php
    }
        ?>
                    
	   
   </main>
</body>
</html>
