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
  	<a href="report.php">Report</a>
  	<a href="logout.php">Logout</a>
</div>
    <div class="main">
      <a href="profile.php" class="change">&#8592; Go Back</a><br>
        <h1>Username Updation:</h1>
        <form action="usernameupdate.php" method="post">
          <h3>Enter New Username: <input type="text" id="uname" name="uname" placeholder="New Username..." required="true"> <input type="submit" value="Change" class="change"></h3>
        </form>
    </div>
  </body>
</html>