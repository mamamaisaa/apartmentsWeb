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
    
    session_start();
    $tmp = $_SESSION['username'];
    
    //query 1 - get the apartent with this user
    $que = "select ID from partment where tenant='$tmp' or owner='$tmp'";
    $res = mysqli_query($conn,$que);
    $rows = mysqli_fetch_assoc($res);
    $home=$rows['ID'];
    
    //query 2 - get the contract belongs to this apartment
    $query="select * from contract_table where aptID='$home'"; 
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    
    //query 3 - get the apartment details
    $query1="select * from partment where ID='$home'"; 
    $result1=mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_assoc($result1);
    
    //query 4 - get the role of the user
    $query = "select role from Sign_up where email='$tmp'";
    $res2 = mysqli_query($conn,$query);
    $roww = mysqli_fetch_assoc($res2);
    $role=$roww['role'];
?>

   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>watch contract</title>
    <link rel="stylesheet" href="basic.css">
    <link rel="shortcut icon" href="photos/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        header{
            width: 100%;
            height: 10%;
        }

        main{
            height: 85%;
            margin: auto;
            width: 50%;
        }

        .full{
            background-color: #f8f7e7;
            width: 100%;
            float: left;
            margin-top: 2%;
            border: 1px solid #487288;
            border-radius: 4px;
        }

        
        hr{
            border: 0.3px solid  #487288;
        }
        
        

        @media screen and (max-width: 700px) {
            header{
                height: 10%;
            }
            main{
                width: 90%;
        }


        }

    </style>
</head>
<body>
    <header class="mainColor">
        <span> <i onclick="history.back()" class="fa fa-angle-double-left"></i></span>
        <p class="slogan1">Tenant management</p>
    </header>
         

    <main>
        <!-- show contract details-->
        <div class="full">
            Price: <?php  
		    echo $row['price'];
            ?> <br> <hr>
            Start date: <?php  
		    echo $row['startDate'];
            ?> <br> <hr>
            End date: <?php  
		    echo $row['endDate'];
            ?> <br> <hr>
            Apartment: <?php  
		    echo $row1['country']; echo", ". $row1['city']; echo", " . $row1['street']; echo" " . $row1['aptNumber']; echo", " . $row1['ZIP']. "<br>" . $row1['aptDescription']; 
		    
		    
            ?> <br> <hr>
            Contract: <br> <?php  
		    echo $row['contract'];
            ?>
        </div>
    </main>
</body>
</html>