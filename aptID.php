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
        
    }
    
    //remember the user's email
    session_start();
    $tmp = $_SESSION['username'];
    
    //query
    $query="select ID from partment WHERE owner= '$tmp'";
    
            $res = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($res);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment ID</title>
    <link rel="stylesheet" href="aptID.css">
    <link rel="stylesheet" href="basic.css">
    <link rel="shortcut icon" href="photos/icon.png" />
</head>
<body>
    <header class="mainColor">
        <div>Tenant management</div>
    </header>

    <main>
        <p class="desc">All right! <br> Now give the code below to your tenant so you can connect!</p>
        <p class="code">

            <?php
            
             echo $row['ID'];

            ?>
            </p>
            
        <!-- go back to home page-->
        <a href="mainOwner.php"> <button class="border fbtn btn">Done connecting</button> </a>
    </main>
    
</body>
</html>