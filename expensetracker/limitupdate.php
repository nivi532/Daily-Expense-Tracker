<?php 
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$link = new mysqli("localhost", "root", "","test");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$lim=$_POST['lim'];
$que="UPDATE login SET `dailylimit`='$lim' WHERE userid=$userid";
if ($link->query($que) === TRUE){	
	$_SESSION['limit']=$lim;
	header("location:profile.php");	
	}
else
		echo 'Error: Try Again';
?>