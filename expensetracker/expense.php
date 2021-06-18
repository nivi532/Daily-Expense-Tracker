<!DOCTYPE html>
<?php
	session_start();
    $username=$_SESSION['username'];?>
<html>
<head>
    <meta charset="utf-8">
    <title>Daily Expense</title>
    <link rel="stylesheet" href="expense.css" />
</head>
<body>
<div class="sidenav">
  <a href="dashboard.php">Dashboard</a>
  <a href="report.php">Report</a>
  <a href="profile.php">Profile</a>
  <a href="logout.php">Logout</a>
</div>
<div class="main">
	<h2>Enter the expense to be added:</h2><br>
    <form method="post" action="expense2.php">
    <table>
    <tr>
        <td>DATE</td>
        <td>EXPENSE NAME</td>
        <td>COST</td>
    </tr>
    <tr>
        <td><input type="DATE" name="date" id="date" required="true"></td>
        <td><input type="text" name="expense" id="expense" required="true"></td>
        <td><input type="cost" name="cost" id="cost" required="true"></td>
    </tr>
</table>
<input type="submit" name="submit" value="Add" class="submit"> 
<?php
        $_SESSION['username']=$username;
    ?>
    </form>
</div>

</body>
</html>
