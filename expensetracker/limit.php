<!DOCTYPE html>
<?php
	session_start();
    $userid=$_SESSION['userid'];
    $username=$_SESSION['username'];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Change Username</title>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="change.css">
	<div class="sidenav">
		<a href="dashboard.php">Dashboard</a>
  	<a href="expense.php">Add Expense</a>
  	<a href="#services">Monthly Expense</a>
  	<a href="logout.php">Logout</a>
</div>
    <div class="main">
      <a href="profile.php" class="change">&#8592; Go Back</a><br>
        <h1>Daily Limit Updation:</h1>
        <form action="limitupdate.php" method="post">
          <h3>Enter New Daily Limit: <input type="text" id="lim" name="lim" placeholder="New Limit..." required="true"> <input type="submit" value="Change" class="change"></h3>
        </form>
    </div>
  </body>
</html>