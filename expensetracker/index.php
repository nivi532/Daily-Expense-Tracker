<?php
$link = new mysqli('localhost','root','','test');
if($link->connect_error)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$username=$_POST['username'];
$password=$_POST['password'];
$username=stripslashes($username);
$password=stripslashes($password);
$username=mysqli_real_escape_string($link,$username);
$password=mysqli_real_escape_string($link,$password);

$st="SELECT * FROM login WHERE username='$username' and password='$password'";
$result=$link->query($st); 
$query2 = "SELECT userid,dailylimit,password FROM login WHERE username='$username'";
$res2=$link->query($query2);
if (mysqli_num_rows($result)== 1 && mysqli_num_rows($res2) === 1)
{
	session_start();
	$val = $res2->fetch_array(MYSQLI_NUM);
	$_SESSION['userid'] = $val[0];
	$_SESSION['limit']=$val[1];
	$_SESSION['pwd']=$val[2];
	$q1="SELECT SUM(cost) FROM expense WHERE `dates`= (SELECT CURRENT_DATE FROM DUAL) && `userid`=$val[0]";
	$res3= $link->query($q1);
	$q2="SELECT SUM(cost) FROM expense WHERE EXTRACT(MONTH FROM `dates`) = EXTRACT(MONTH FROM (SELECT CURRENT_DATE FROM DUAL)) && `userid`=$val[0]";
	$q3="SELECT SUM(cost) FROM expense WHERE EXTRACT(YEAR FROM `dates`) = EXTRACT(YEAR FROM (SELECT CURRENT_DATE FROM DUAL)) && `userid`=$val[0]";
	$res4=$link->query($q3);
	$result2=$link->query($q2);
	if (mysqli_num_rows($res3) === 1 && mysqli_num_rows($result2) === 1 && mysqli_num_rows($res4) === 1) {
		$val2=$res3->fetch_array(MYSQLI_NUM);
		$val3=$result2->fetch_array(MYSQLI_NUM);
		$val4=$res4->fetch_array(MYSQLI_NUM);
		if(is_null($val2[0]) && is_null($val3[0]) && is_null($val4[0])){
			$_SESSION['daily']=0;
			$_SESSION['monthly']=0;
			$_SESSION['yearly']=0;
		}
		else{
			$_SESSION['daily']=$val2[0];
			$_SESSION['monthly']=$val3[0];
			$_SESSION['yearly']=$val4[0];
		}

	$_SESSION['username']="$username";
    header("location:dashboard.php");
	}
	else
		echo "ERROR: Try Again";
}
else 
{
	echo "Failure";
}
?>