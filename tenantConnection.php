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

    $code = $_POST['code'];
    session_start();
    $tmp = $_SESSION['username'];
    $temp = $_SESSION['owner'];
    
    

    //query - check if the apartment code exists
    $query = "select * from partment where ID='$code'";
    $res = mysqli_query($conn,$query);
    
    //if the apartment code is right
    if(mysqli_num_rows($res) == 1){
        
        //update DB
        $sql= "UPDATE partment SET tenant='$tmp' WHERE ID='$code' ";
        
        //if update was successfull, go to furniture list
        if ($conn->query($sql) == TRUE) {
            header("Location: furnitureLst.html");
    
        }
        //update to DB was not successfull
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    //the apartment code is wrong
    }else{
        header("Location: wrongCode.html");
    }

    $conn->close();
   
?>