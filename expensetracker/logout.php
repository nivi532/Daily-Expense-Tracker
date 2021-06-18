<?php
session_start();
unset($_SESSION['username']); 
unset($_SESSION['userid']);
session_unset();  
session_destroy();   
header("Location:index.html");
?>