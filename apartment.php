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

    session_start();
    
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $streetNumber = $_POST['streetNumber'];
    $aptNumber = $_POST['aptNumber'];
    $ZIP = $_POST['ZIP'];
    $aptDescription = $_POST['aptDescription'];
    $tmp = $_SESSION['username'];
    
    //insertion to DB
    $sql = "INSERT INTO partment ( country, city, street, streetNumber, aptNumber, ZIP, aptDescription, owner) VALUES
     ( '$country', '$city', '$street', '$streetNumber', '$aptNumber', '$ZIP', '$aptDescription', '$tmp')";
     
    //if insertion was successful
    if ($conn->query($sql) == TRUE) {
        header("Location: contract.html");
        
    //insertion was not successful   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

    $conn->close();

    
?>