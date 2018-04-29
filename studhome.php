<?php
   include('session.php');
   if (!(isset($_SESSION['login_user'])))
{
    header("location: loginreal.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="struct2.css">
  <script type="text/javascript">
    
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
  </script>
</head>
<body >

	<div class="stick">
    <div class="hd">
      <div class="col-logo">
        EPo
      </div>
      <div class="col-name">
        EduPortal
      </div>
      
      <div class="col-usout">
        <button class="btn" 
        onclick="window.location.href='logoutct.php'"><em><?php echo $login_session;?> </em><br> Sign Out</button>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="#home" class="active">Home</a>
      <a href="shoqq1.php">Quiz</a>
      <a href="studentupload.php">Assignments</a>
      <a href="viewmat">Materials</a>
      <a href="aview1">Extra-learning</a>
      <a href="score.php">Scores</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
  <div class="main">
    <p>Hi, <?php echo $login_session;?> ! <br> Good to see you here.<br>This is the student home page.<br>Let's study!. </p>
  </div>
  
</body>
</html>