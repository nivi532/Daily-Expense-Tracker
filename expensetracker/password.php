<!DOCTYPE html>
<?php
	session_start();
    $userid=$_SESSION['userid'];
    $username=$_SESSION['username'];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Change Password</title>
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
        <h1>Password Updation:</h1>
        <form action="pwdupdate.php" method="post">
          <h3>Enter New Password: <input type="password" id="newpwd" name="newpwd" placeholder="New Password..." onkeyup="pwdlen();" required="true">
            <span id = "msg"></span>
            <br><br>
            Confirm Password: <input type="password" id="conpwd" name="conpwd" placeholder="Confirm Password..." onkeyup='checkpwd();' required="true">
            <span id='message'></span>
            <br>
            <input type="submit" value="Change" class="change"></h3>
        </form>
    </div>
  </body>
  <script type="text/javascript">
  function pwdlen(){
    var pwd = document.getElementById("newpwd").value;  
    if(pwd.length < 6) {  
      document.getElementById('msg').style.color = 'red';
     document.getElementById('msg').innerHTML = "**Password length must be atleast 6 characters";   
    }  
    else{
      document.getElementById('msg').innerHTML = ""; 
    }
  }
  function checkpwd(){
    if (document.getElementById('newpwd').value ==
    document.getElementById('conpwd').value){
       document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '';
    }
    else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = '**Passwords are not the same';
  }
  }
</script>
</html>