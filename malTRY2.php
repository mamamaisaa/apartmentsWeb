<?php
 
    //DB connection 
    require_once 'dbConfig.php'; 
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
    $query="select * from mal,images where home='$home' and mal.id=images.id"; 
    $result=mysql_query($query);
    
    
    $que5 = "select * from Sign_up where email='$tmp'";
    $res5 = mysqli_query($conn,$que5);
    $row5 = mysqli_fetch_assoc($res5);
    $role=$row5['role'];
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Malfunctions </title> 
		<link rel="stylesheet" href="basic.css">
		<link rel="stylesheet" href="malfunctionsList.css">
		<link rel="stylesheet" href="malTRY2.css">
		<link rel="stylesheet" href="submit.css">
		<link rel="shortcut icon" href="photos/icon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		       integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
		        src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head> 
	
	    
	 <body>
	   <header class="mainColor">
	   <div class="head1 mainColor">
	        <?php 
                if($role=='tenant'){
                    ?> 
                        
                        <!--go back button-->
                        <a class="signup" href="mainTenant.php"> <span> <i class="fa fa-angle-double-left"></i></span></a>
                        
                <?php 
                }
                else{
        ?>
        
                        <!--go back button-->
                        <a class="signup" href="mainOwner.php"> <span> <i class="fa fa-angle-double-left"></i></span></a>
        
        <?php
    }
                    ?>
        
            <p class="slogan1">Tenant management</p>
        </div>
    </header>
	    
	    
	
		<?php while($rows=mysql_fetch_assoc($result)) 
		{ 
		?> 
            <!--malfunction header: "id - title" -->
            <div class="other">
                <div class="title">
                    <?php echo $rows['id']; ?>
                    <?php echo '- ' ?> 
                    <?php echo $rows['title']; ?>
                </div>
            </div>
            
            <!--malfunctions content-->
            <div class="other" id="info">
            <?php echo "Category: "; echo $rows['category']; echo"." ?> 
            <?php echo "Location: "; echo $rows['mLocation']; echo"." ?><br>
            <?php echo "Description: "; echo $rows['mDescription']; ?><br>
            <?php echo "Wanted fixing date: "; echo $rows['dateTxt']; echo"." ?>
            <?php echo "Wanted fixing time: "; echo $rows['fTime']; ?><br>
            <p>status: <?php echo $rows['status']; ?></p>
            
            <!-- show the malfunctions image-->
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['image']); ?>" style='border: 1px solid #ddd; border-radius: 4px; ; width: 150px' />
            <form action="updatemal.php" method="post">
                <input type="text" value="<?php echo $rows['id']; ?>" name="id" id="id" style="display:none;" >
                <p style="margin-top:5px; "><label>
                    update status:
                    <?php 
                        if($role=='tenant'){
                            ?>
                            <select id="status" class=" fbtn " name="status" style="border:1px solid #ddd;">
                                <option value="open" id="open">open</option>
                                <option value="re-open" id="re-open">re-open</option>
                                <option value="close" id="close">close</option>
                            </select>
                </label></p> <?php
                        } else{ ?>
                            <select id="status" class=" fbtn " name="status" style="border:1px solid #ddd;">
                                <option value="done-treatment" id="done-treatment">done treatment</option> 
                                <option value="close" id="close">close</option>
                            </select>
                </label></p> <?php } ?>
                <p><label>
                    <button type="submit" class="fbtn iphone" style="border:1px solid #ddd;">update status</button>
                </label></p>
                </form>
            </div>
        </div>
        
	<?php 
               } 
          ?> 

	</body> 
	</html>