<?php
    $server_name = "localhost";
    $user_name = "ismaisaajb";
    $password = "wr8*l=azISW";
    $database = "ismaisaa_test";

    mysql_connect('localhost','ismaisaajb','wr8*l=azISW'); 
    mysql_select_db('ismaisaa_test'); 
    $conn= new mysqli($server_name, $user_name, $password, $database);
    
    $id = $_POST['id'];
    $status = $_POST['status'];

    session_start();
    $tmp = $_SESSION['username'];
    $sql = "UPDATE mal SET status='$status' WHERE id='$id'";
    
    $que = "select ID from partment where tenant='$tmp' or owner='$tmp'";
    $res = mysqli_query($conn,$que);
    $row = mysqli_fetch_assoc($res);
    $home=$row['ID'];
    
    $sql2="INSERT INTO chat (sender,home,text) VALUES ('$tmp','$home','MALFUNCTION $id STATUS UPDATED') ";
    if ($conn->query($sql) == TRUE AND $conn->query($sql2) == TRUE) {
        header("Location: malTRY2.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
    
    
?> 