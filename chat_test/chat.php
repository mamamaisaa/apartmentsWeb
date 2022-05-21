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
    
    session_start();
    $tmp2 = $_SESSION['username'];
    $que2="select * from Sign_up where email='$tmp2'";
    $res2=mysqli_query($conn,$que2);
    $row2=mysqli_fetch_assoc($res2);
    $name=$row2['firstName']."&nbsp".$row2['lastName'];
    
    
    ?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> chat </title> 
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="chat.css">
		
    <meta http-equiv="refresh" content="10">
   
    <script>
        var input = document.getElementById("text");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("send").click();
        }
    });
    </script>

    </head> 
	<body>
            <div class="spacing"></div>
            <?php 
                if($row2['role']=='tenant'){
                    ?> 
                        <header>
                        <!--go back button-->
                        <a class="signup" href="../mainTenant.php"> <span> <i class="fa fa-angle-double-left"></i></span></a>
                        <br>
                        Hello <?php
                            echo $name;
                        ?>
                        </header>
                <?php 
                }
                else{
        ?>
        <header>
                        <!--go back button-->
                        <a class="signup" href="../mainOwner.php"> <span> <i class="fa fa-angle-double-left"></i></span></a>
                        <br>
                        Hello <?php
                            echo $name;
                        ?>
                        </header>
        <?php
    }
                    ?>
            
            <main>
            <div class="cht" id="cht">
                <br>
	             <?php
	                $quer = "select * from chat where home='$home' ORDER BY id";
                    $rslt = mysqli_query($conn,$quer);
                    while($rows = mysqli_fetch_assoc($rslt)){
                            
                        if($tmp==$rows['sender']){
                            ?>
                            <div class="me">
                                <div class="txt">
                                   <?php 
                                echo "&nbsp".$rows['text']."&nbsp";
                                ?> 
                                </div>
                                <div class="time">
                                    <?php 
                                echo "&nbsp".$rows['time']."&nbsp";
                                ?> 
                                </div>
                            </div>
    
                      <br>
                       
                        <?php
                    }
                    else{
                        ?>
                        <div class="other">
                            <div class="txt">
                                   <?php 
                                echo "&nbsp".$rows['text']."&nbsp";
                                ?> 
                                </div>
                                <div class="time">
                                    <?php 
                                echo "&nbsp".$rows['time']."&nbsp";
                                ?> 
                                </div>
                        </div>
                       <br>
                        
                        <?php
                    }
                    }
                    ?>
            </div> 
	         <form method="POST" action="send.php">
	             <input type="text" class="sendtxt" name="text" id="text" required>
	             <input type="submit" class="submit" value="send" id="send">
	         </form>
	    </main>
	 </body>
</html>






