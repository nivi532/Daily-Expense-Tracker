<?php
session_start();
$link = new mysqli("localhost", "root", "","test");
 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username=$_POST['username'];
$password=$_POST['password'];
$dailylimit=$_POST['dailylimit'];
$query = "INSERT INTO login (username, password, dailylimit) VALUES('$username', '$password', '$dailylimit')";
$query2 = "SELECT userid,dailylimit,password FROM login WHERE username='$username'";
$res1=$link->query($query);
$res2=$link->query($query2);
if ( $res1 === TRUE && mysqli_num_rows($res2) === 1) 
{
	$val = $res2->fetch_array(MYSQLI_NUM);
	$_SESSION['username'] = '$username'; 
	$_SESSION['daily'] = 0;
	$_SESSION['monthly'] = 0;
	$_SESSION['yearly'] = 0;
	$_SESSION['userid'] = $val[0];
	$_SESSION['limit']=$val[1];
	$_SESSION['pwd']=$val[2];
	session_name('$username');
	header("location:dashboard.php");	
}
else 
{
	header("location:index.html");	
}
?>