<?php 
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$link = new mysqli("localhost", "root", "","test");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$date=$_POST['date'];
$expense=$_POST['expense'];
$cost=$_POST['cost'];

$q="INSERT INTO expense(userid,dates,expense,cost) VALUES($userid,'$date','$expense',$cost)";
if ($link->query($q) === TRUE){	
	$q1="SELECT SUM(cost) FROM expense WHERE `dates`= (SELECT CURRENT_DATE FROM DUAL) && `userid`=$userid";
	$q2="SELECT SUM(cost) FROM expense WHERE EXTRACT(MONTH FROM `dates`) = EXTRACT(MONTH FROM (SELECT CURRENT_DATE FROM DUAL)) && `userid`=$userid";
	$q3="SELECT SUM(cost) FROM expense WHERE EXTRACT(YEAR FROM `dates`) = EXTRACT(YEAR FROM (SELECT CURRENT_DATE FROM DUAL)) && `userid`=$userid";
	$result= $link->query($q1);
	$res2=$link->query($q2);
	$res3=$link->query($q3);
	if( mysqli_num_rows($result) === 1 && mysqli_num_rows($res2) === 1 && mysqli_num_rows($res3) === 1){
		$val=$result->fetch_array(MYSQLI_NUM);
		$val2=$res2->fetch_array(MYSQLI_NUM);
		$val3=$res3->fetch_array(MYSQLI_NUM);
		if(is_null($val[0]))
			$_SESSION['daily']=0;
		else
			$_SESSION['daily']=$val[0];
		if(is_null($val2[0]))
			$_SESSION['monthly']=0;
		else
			$_SESSION['monthly']=$val2[0];
		if(is_null($val3[0]))
			$_SESSION['yearly']=0;
		else
			$_SESSION['yearly']=$val3[0];

			header("location:expense.php");	
	}
	else
		echo 'Error: Try Again';
}
else 
{
	echo 'Error: Try Again';
}

 ?>