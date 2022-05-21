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
        echo "connected succussfully <br>"; 
    }

    
    $email = $_POST['username'];
    $password1 = $_POST['password'];
    
    session_start();
    $_SESSION['username'] = $email;
    
    //query 1 - user 
    $sql = "SELECT * FROM Sign_up WHERE email='$email' AND password1='$password1'";
    $res = mysqli_query($conn,$sql);
    
    function getTheDay($date){
        $curr_date=strtotime(date("Y-m-d H:i:s"));
        $the_date=strtotime($date);
        $diff=floor(($curr_date-$the_date)/(60*60*24));
        return $diff;
    }
    
    //email and password are right
    if(mysqli_num_rows($res) == 1){
         //query 2 - take the user's role
        $query = "select role from Sign_up where email='$email'";
        $res2 = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($res2);
        $role=$row['role'];
    
        $que="select ID from partment where tenant='$email' or owner='$email'";
        $res3 = mysqli_query($conn,$que);
        $row3 = mysqli_fetch_assoc($res3);
        $home=$row3['ID'];
    
        $que1="select * from contract_table where aptID='$home'";
        $res4=mysqli_query($conn,$que1);
        $row4 = mysqli_fetch_assoc($res4);
        $date=$row4['endDate'];
    
        if(getTheDay($date)>0){
            $end = "DELETE FROM Sign_up where email='$email'";
            $end2="DELETE FROM partment where tenant='$email' or owner='$email'";
            $end3="DELETE FROM chat where sender='$email'";
            $end4="DELETE FROM frunlst where email='$email'";
            $end5="DELETE FROM mal where tenant='$email'";
            if ($conn->query($end) === TRUE AND $conn->query($end2) === TRUE AND $conn->query($end3) === TRUE AND $conn->query($end4) === TRUE) {
                header("Location: expired.html"); } 
        }
        else{
            //check the user's role and go to next page
            if($role=='tenant'){
                header("Location: mainTenant.php"); } 
            if($role=='owner'){
                header("Location: mainOwner.php"); }
        }
      
    //email or password are incorrect
    }else {
            header("Location: wrong.html");
    }
     
    $conn->close();
?>