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

    $title = $_POST['title'];
    $category = $_POST['category'];
    $mLocation = $_POST['mLocation'];
    $mDescription = $_POST['mDescription'];
    $dateTxt = $_POST['dateTxt'];
    $fTime = $_POST['fTime'];

    session_start();
    $tmp = $_SESSION['username'];
    $query = "select ID from partment where tenant='$tmp'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    $home=$row['ID'];

    //insertion
    $sql = "INSERT INTO mal (title, category, mLocation, mDescription, dateTxt, fTime , tenant, home, status) VALUES
     ('$title', '$category', '$mLocation', '$mDescription', '$dateTxt', '$fTime', '$tmp', '$home', 'open')";
     
     $sql2="INSERT INTO chat (sender,home,text) VALUES ('$tmp','$home','NEW MALFUNCTION HAS BEEN OPEND') ";
    //if insertion was successfull, go to image picking page
    if ($conn->query($sql) == TRUE AND $conn->query($sql2) == TRUE ) {
        header("Location: imggg.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();


    
    
?>