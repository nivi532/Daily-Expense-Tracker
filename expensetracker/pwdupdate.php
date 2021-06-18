<?php 
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$link = new mysqli("localhost", "root", "","test");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$newpwd=$_POST['newpwd'];
$que="UPDATE login SET `password`='$newpwd' WHERE userid=$userid";
if ($link->query($que) === TRUE){ 
  $_SESSION['pwd']=$newpwd;
  header("location:profile.php"); 
  }
else
    echo 'Error: Try Again';
?>