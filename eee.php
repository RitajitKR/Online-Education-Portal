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
  <link rel="stylesheet" type="text/css" href="struct.css">
  <link rel="stylesheet" type="text/css" href="navbarcss.css">
</head>
<body >
  <div style="background-color: grey;width: 100%; position: fixed; top: 0;left:0;right: 0;">
      <div class="row">
        
            <div class="col-25">
                <img src="vit.png">
              </div>
              <div class="col-75">
                <p style="font-weight: bold; font-size: 45px; color: black;">Edu Portal<p>
            </div>
        </div>

        
    <div style="width: 100%;position: relative; " align="center">
        <label for="show-menu" class="show-menu">Show Menu</label>
    <input type="checkbox" id="show-menu" role="button">
        <ul id="menu">
        <li><a href="studhome.php">Home</a></li>
        <li>
            <a href="#">Departments</a>
            <ul class="hidden">
                <li><a href="#">CSE</a></li>
                <li><a href="#">ECE</a></li>
                <li><a href="#">EEE</a></li>
                <li><a href="#">MECH</a></li>
                <li><a href="#">CIVIL</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Library</a>
            
        </li>
        
    </ul> <div class="col-la">
                <p style="font-weight: bold; font-size: 20px; color:black"><?php echo $login_session; ?> | <a href = "logoutct.php">Sign Out</a><p>
            </div>
      </div>
    </div>
    <div class="left"><p>l ad</p></div>
  <div class="right"><p>r ad</p></div>
  </div>

    <div class="container" align="center" style="position: absolute; overflow: auto; top: 35%; right: 20%;left: 20%;">
      <div style = "width:300px; border-radius: 5px;  border: solid 1px #333333; background-color: white; box-shadow: 10px 10px 5px grey;top:50%" align = "left" >
            
            <div style = "margin:30px; color: black" class='inv'>
               
               EEE<br>EEE<br>EEE<br>EEE<br>
              

               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php error_reporting(0);echo $error; ?></div>
               
            </div>
            
         </div>
       </div>



            <div style="position: fixed; color:white; background-color: green; bottom: 0; width: 100%; left: 0;">
            <footer>
              
          <center>16BCI0151 Ritajit || copyright © 2010-2018 </center>
          </footer>
          </div>
</body>
</html>