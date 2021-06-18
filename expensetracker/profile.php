<!DOCTYPE html>
<?php
	session_start();
    $userid=$_SESSION['userid'];
    $username=$_SESSION['username'];
    $daily=$_SESSION['daily'];
    $limit=$_SESSION['limit'];
    $pwd=$_SESSION['pwd'];
    $monthly=$_SESSION['monthly'];
    $yearly=$_SESSION['yearly'];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>My Profile</title>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="profile.css">
	<div class="sidenav">
		<a href="dashboard.php">Dashboard</a>
  	<a href="expense.php">Add Expense</a>
  	<a href="report.php">Report</a>
  	<a href="logout.php">Logout</a>
</div>
    <div class="main">
    	<h1>Profile:</h1>
    		<h2>Username: <?php echo $username; ?></h2>
    		<h2>Password: <?php echo $pwd; ?></h2>
    		<h2>Daily Limit: <?php echo $limit; ?></h2>
            <h2>Amount spent today: <?php echo $daily; ?></h2>
            <h2>Current Month Expense: <?php echo $monthly; ?></h2>
            <h2>Current Year Expense: <?php echo $yearly; ?></h2>
    	<div>
    		<h1>Change: <a href="username.php">Username</a> || <a href="password.php">Password</a> || <a href="limit.php">Daily Limit</a> </h1>
    	</div>
    </div>
</body>
</html>