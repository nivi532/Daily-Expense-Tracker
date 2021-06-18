<?php 
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$link = new mysqli("localhost", "root", "","test");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$uname=$_POST['uname'];
$que="UPDATE login SET `username`='$uname' WHERE userid=$userid";
if ($link->query($que) === TRUE){	
	$_SESSION['username']=$uname;
	header("location:profile.php");	
	}
else
		echo 'Error: Try Again';
	?>
