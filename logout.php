<?php  

//ensure you are using same session
session_start(); 

//destroy the session
session_destroy(); 

//go back to login page after the user is disconnected
header("location:index.html"); 

exit();

?>