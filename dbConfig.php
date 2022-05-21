<?php  
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "ismaisaajb";  
$dbPassword = "wr8*l=azISW";  
$dbName     = "ismaisaa_test";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}


