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
    <title>Report</title>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="report.css">
	<div class="sidenav">
    <a href="dashboard.php">Dashboard</a>
  <a href="expense.php">Add Expense</a>
  <a href="profile.php">Profile</a>
  <a href="logout.php">Logout</a>
</div>
    <div class="main">
      <form role="form" method="post" action="reportsubmit.php" name="bwdatesreport">
                <div>
                  <h2>Report of Expenses:</h2>
                  <h3>From Date</h3>
                  <input type="date"  id="fromdate" name="fromdate" required="true">
                  <h3>To Date</h3>
                  <input type="date"  id="todate" name="todate" required="true">
                </div>
                <div><br>
                  <button type="submit" class="submit" name="submit">Submit</button>
                </div>        
                </div>
              </form>
            </div>
          </body>
          </html>
