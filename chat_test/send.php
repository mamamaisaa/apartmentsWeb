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
    $que = "select ID from partment where tenant='$tmp' or owner='$tmp'";
    $res = mysqli_query($conn,$que);
    $row = mysqli_fetch_assoc($res);
    $home=$row['ID'];
    
	$txt=$_POST['text'];
	$sql="INSERT INTO chat (sender,home,text) VALUES ('$tmp','$home','$txt') ";
	
	if ($conn->query($sql) == TRUE) {
        header("Location: /chat_test/chat.php");
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

    $conn->close();
?> 