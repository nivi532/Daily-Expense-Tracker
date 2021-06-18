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
    <title>Dashboard - <?php echo $username; ?></title>
</head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>
  <link rel="stylesheet" type="text/css" href="dashboard.css">
	<div class="sidenav">
  <a href="expense.php">Add Expense</a>
  <a href="report.php">Report</a>
  <a href="profile.php">Profile</a>
  <a href="logout.php">Logout</a>
</div>
    <div class="main">
  <h2>Dashboard</h2>
  <div class="grid-container">
  <div class="grid-item">
  	<h1>Daily Expense</h1>
    <div id="myChart1" style="padding: 0px 10px 0px 95px;">
</div>
  </div>
  <div class="grid-item">
  	<h1>Monthly Expense</h1>
    <div id="myChart2" style="padding: 0px 10px 0px 95px;">
  </div>
  </div>
  <div class="grid-item">
  	<h1>Yearly Expense</h1>
    <div id="myChart3" style="padding: 0px 10px 0px 95px;">
  </div>  
</div>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);

function drawChart1() {
  var d=<?php echo $daily; ?>;
        var l=<?php echo $limit; ?>;
        if(d > l){
          var data = google.visualization.arrayToDataTable([
        ['Today', 'Percentage'],
        ['Spent',100]
      ]);
          var options = { legend: 'none' ,
                width:300,
                height:300,
                pieHole: 0.5,
                colors: ['red']
              };
              alert("Daily Limit Exceeded!");
              var chart = new google.visualization.PieChart(document.getElementById('myChart1'));
  chart.draw(data,options);
        }
        else{
          if(d==0){
            document.getElementById('myChart1').innerHTML="No expense today yet!"
          }
          else{
            var width= (d / l * 100);
          var data = google.visualization.arrayToDataTable([
            ['Today', 'Percentage'],
            ['Spent',width],
            ['Left',100-width]
          ]);
          var options = { legend: 'none' ,
                width:300,
                height:300,
                pieHole: 0.5,
                tooltip: {text: 'percentage'},
                colors: ['#ffb84d', '#800080']
              };
              var chart = new google.visualization.PieChart(document.getElementById('myChart1'));
  chart.draw(data,options);
            }
        }
}

function drawChart2() {
  var m=<?php echo $monthly; ?>;
          var l=<?php echo $limit; ?>;
          var dt = new Date();
 var month = dt.getMonth() + 1;
var year = dt.getFullYear();
var daysInMonth = new Date(year, month, 0).getDate();
        l=l*daysInMonth;
        console.log(m)
        console.log(l)
        if(m > l){
          var data = google.visualization.arrayToDataTable([
        ['This month', 'Percentage'],
        ['Spent',100]
      ]);
          var options = { legend: 'none' ,
                width:300,
                height:300,
                pieHole: 0.5,
                colors: ['red']
              };
              alert("Monthly Limit Exceeded!");
              var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
  chart.draw(data,options);
        }
        else{
          if(m==0){
            document.getElementById('myChart2').innerHTML="No expense this month!"
          }
          else{
            var width= (m / l * 100);
          var data = google.visualization.arrayToDataTable([
            ['This Month', 'Percentage'],
            ['Spent',width],
            ['Left',100-width]
          ]);
          var options = { legend: 'none' ,
                width:300,
                height:300,
                pieHole: 0.5,
                tooltip: {text: 'percentage'},
                colors: ['#ffb84d', '#800080']
              };
              var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
  chart.draw(data,options);
            }
        }
}

function drawChart3() {
  var y=<?php echo $yearly; ?>;
          var l=<?php echo $limit; ?>;
          var dt = new Date();
          var year = dt.getFullYear();
          if (year % 400 === 0 || (year % 100 !== 0 && year % 4 === 0)) {
            var daysInYear=366;
          }
          else
            var daysInYear=365;
        l=l*daysInYear;
        if(y > l){
          var data = google.visualization.arrayToDataTable([
        ['This year', 'Percentage'],
        ['Spent',100]
      ]);
          var options = { legend: 'none' ,
                width:300,
                height:300,
                pieHole: 0.5,
                colors: ['red']
              };
              alert("Yearly Limit Exceeded!");
              var chart = new google.visualization.PieChart(document.getElementById('myChart3'));
  chart.draw(data,options);
        }
        else{
          if(y==0){
            document.getElementById('myChart3').innerHTML="No expense this Year!"
          }
          else{
            var width= (y / l * 100);
          var data = google.visualization.arrayToDataTable([
            ['This Year', 'Percentage'],
            ['Spent',width],
            ['Left',100-width]
          ]);
          var options = { legend: 'none' ,
                width:300,
                height:300,
                pieHole: 0.5,
                tooltip: {text: 'percentage'},
                colors: ['#ffb84d', '#800080']
              };
              var chart = new google.visualization.PieChart(document.getElementById('myChart3'));
  chart.draw(data,options);
            }
        }
}
      // var x=document.querySelector(':root')
      // function func(){
      //   console.log('hello')
      //   html.style.visibility='visible'
        
      //   width=width+'%'
      //   console.log(width)
      //   x.style.setProperty('--name', width)
      //}
</script>
</body>
</html>