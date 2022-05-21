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

    $theprice = $_POST['pricee'];
    $thestartdate = $_POST['Sdate'];
    $theenddate = $_POST['Edate'];
    $thecontract = $_POST['contractt'];
    session_start();
    $tmp = $_SESSION['username'];

    //query
    $query = "select ID from partment where owner='$tmp'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    $home=$row['ID'];
    
    //insertion
    $sql = "INSERT INTO contract_table (price, startDate, endDate, contract, aptID) VALUES
     ('$theprice', '$thestartdate', '$theenddate', '$thecontract', '$home')";
     
    //if insertion was successfull, go to the next page 
    if ($conn->query($sql) == TRUE) {
        header("Location:aptID.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

?>