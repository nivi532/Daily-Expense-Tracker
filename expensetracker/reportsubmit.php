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
      <h2>Report of Expenses:</h2>
      <table id="datatable" class=" ">
        <thead>
            <tr>
              <th>S.NO</th>
              <th>Date</th>
              <th>Expense Amount</th>
            </tr>
        </thead>
 <?php
$link = new mysqli("localhost", "root", "","test");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$testing=mysqli_query($link,"SELECT dates,SUM(cost) as Dailytotal FROM `expense`  where (dates BETWEEN '$fromdate' and '$todate') && (userid='$userid') group by dates");
$c=1;
$total=0;
while ($row=mysqli_fetch_array($testing)) {

?>
              
                <tr>
                  <td><?php echo $c;?></td>
                  <td><?php  echo $row['dates'];?></td>
                  <td><?php  echo $dtotal=$row['Dailytotal'];?></td>
                </tr>
                <?php
                $total+=$dtotal; 
$c=$c+1;
}?>

 <tr>
  <th colspan="2" style="text-align:center">Grand Total</th>     
  <td><?php echo $total;?></td>
 </tr>     

                                    </table>
                                  </div>
                                </body>
                                </html>
