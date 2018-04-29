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
  <title>Faculty Home</title>
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
      <a href="facultyhome.php" class="active">Home</a>
      <a href="qmake.php">Quiz</a>
      <a href="assignmentquestion.php">Assignments</a>
      <a href="evaluateassignment.php">Evaluate</a>
      <a href="studymaterialupload.php">Materials</a>
      <a href="#about">Extra-learning</a>
      
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
  <div class="main">
    <p>Hi, <?php echo $login_session;?> ! <br> Good to see you here.<br>This is the faculty home page.<br>Let's teach!. </p>
  </div>
  
</body>
</html>