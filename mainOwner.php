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
    $que = "select * from Sign_up where email='$tmp'";
    $res = mysqli_query($conn,$que);
    $rows = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="basic.css">
    <link rel="stylesheet" href="mainStyle.css">
    <link rel="shortcut icon" href="photos/icon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        
        //functions showing and hiding
        function show1(){
            document.getElementById("paypall").style.display="block";
        }

        function hide1(){
            document.getElementById("paypall").style.display="none";
        }
        
        function show(){
            document.getElementById("window").style.display="block";
        }
        function hide(){
            document.getElementById("window").style.display="none";
        }
        
       
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <header class="mainColor">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" onclick="show()"class="glyphicon glyphicon-user out" onclick="show()" class="glyphicon glyphicon-user out" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
         <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
        <p class="slogan1">Tenant management</p>
    </header>

    <main>
        <!--users settings-->
        <div id="window">
           <p style="color:#1A5058;">
               <button onclick="hide()" class="xx">X</button> <br>
               <?php  
    		    echo "<br>".$rows['firstName']." ".$rows['lastName']."<br>"."0".$rows['phone']."<br>".$rows['email']."<br> Apartment Owner";
                ?> 
                <br>
                <br>
                <a href="logout.php"><button class="logout">logout</button></a>
            </p>
        </div>
        
        <!--chat function-->
        <div class="other">
          <a href="chat_test/chat.php"><img src="photos/chat.png" alt="chat" class="func"></a>
          <p>chat</p>
        </div>

        
        <!--watch you tenant's malfunctions list-->
        <div class="other">
            <a href="malTRY2.php"><img src="photos/malfunctions.png" alt="malfunction" class="func"></a>
            <p>malfunctions</p>
        </div>

        <!--payment function-->
        <div class="other" onclick="show1()">
            <img src="photos/money.png" alt="money" class="func">
            <p>payment</p>
        </div>
            
        <div class="paypal" id="paypall">
<button onclick="hide1()" class="xx">X</button>
    
    <br>
    <div id="paypal-payment-button"></div>
               

    <script src="https://www.paypal.com/sdk/js?client-id=ATqJoT8uledW83BN2RvdA4o9tptMnGw4EUVlV1na6YHhKgqXEHcJXE8t0EZLGsDr4mybfMJ5nXxL10vQ&disable-funding=credit,card"></script>
    <script>paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: '0.1'
                }
            }]
        });
    },
    
    //payment was made successfully
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("success.php")
        })
    },
    //payment was not made successfully
    onCancel: function (data) {
        window.location.replace("oncancel.php")
    }
}).render('#paypal-payment-button');</script>
    
    <br>
    

    </div>
    
        <!--watch contract function-->
        <div class="other">
            <a href="watchCon.php"><img src="photos/contract.png" alt="contract" class="func"></a>
            <p>contract</p>
        </div>
    </main>
    
      
</body>
</html>