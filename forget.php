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

    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $role = $_POST['role'];

    session_start();
    $_SESSION['username'] = $email;
    $_SESSION['role'] = $role;
    
    print_r( $_SESSION);
 
    $query="select * from Sign_up where email='$email'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($res);
    $check_phone=$row['phone'];
    $check_role=$row['role'];

    if($check_phone==$phone AND $check_role==$role){
        $sql = "UPDATE Sign_up SET password1='$password1' where email='$email' AND phone='$phone' AND role='$role'";
        if($conn->query($sql) == TRUE){
            header("Location: updated.html");
        }
    }
     else {
        header("Location: fail.html");
    }
    
    
    $conn->close();

    
?>