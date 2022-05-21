<?php 

//include the DB configuration file  
require_once 'dbConfig.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = '';
$server_name = "localhost";
$user_name = "ismaisaajb";
$password = "wr8*l=azISW";
$database = "ismaisaa_test";
$con= new mysqli($server_name, $user_name, $password, $database);

session_start();
$tmp = $_SESSION['username'];
$tst="select * from Sign_up where email='$tmp'"; 
$reslt = mysqli_query($con,$tst);
$rows = mysqli_fetch_assoc($reslt);

if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                if($rows['role']=='tenant')
                {
                    header("Location: mainTenant.php");
                } 
                if($rows['role']=='owner')
                {
                    header("Location: mainOwner.php");
                }

            }else{ 
                $statusMsg = "File upload failed, please try again."; 
                header("Location: oncancel.php");
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        header("Location: oncancel.php");
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>