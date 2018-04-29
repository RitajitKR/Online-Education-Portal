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
      <a href="viewmat.php">Materials</a>
      <a href="#about">Extra-learning</a>
      <a href="score.php">Scores</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
  <div class="main">
    <?php

$dir_path = "matview/";
$extensions_array = array('pdf','doc','docx');

if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            
          echo "<a href='matview/$files[$i]'>$files[$i]</a><br>";
            
            // get file extension
            
           
        }
    }
}
?>
  </div>