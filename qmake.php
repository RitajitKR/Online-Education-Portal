<?php
session_start();
?>
<html>
	<head>
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
	<!-- <link rel = "stylesheet"   type = "text/css"   href = "tabcss.css" /> -->
		<script type="text/javascript" src="tabjs.js"></script>
		<?php $time = $_SERVER['REQUEST_TIME'];

/**
* for a 30 minute timeout, specified in seconds
*/
$timeout_duration = 500;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
	echo "<script type='text/javascript'>alert('Sess out');</script>";
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time; ?>
	</head>
	<body>
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
        onclick="window.location.href='logoutct.php'"><em><?php echo $_SESSION['login_user'];?> </em><br> Sign Out</button>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="facultyhome.php">Home</a>
      <a href="qmake.php" class="active">Quiz</a>
      <a href="#contact">Assignments</a>
      <a href="#about">Materials</a>
      <a href="#about">Extra-learning</a>
      <!-- <a href="score.php" >Scores</a> -->
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
    		
		
		
<!-- 		<div id="wrapper" style="position: relative;top:250px;" >
 -->			<form action="site2.php" method="post">
			<div class="main" style="width: 100%;margin-left: 2px;">
			<center>
				<table  class="table-responsive"  align='center' cellspacing=2 cellpadding=5 id="data_table0" border=1>

<tr>
<td>Name</td>
<td><input type="text" name="name" id="name" required title="No Number Allowed"></td>
</tr>

<tr>
<td>Course Code</td>
<td><input type="text" name="cid" id="cid"  required title="No Number Allowed"></td>
</tr>
<!-- <tr>
<td>Course Code</td>
<td><input type="text" name="cid" id="cid"  required title="No Number Allowed"></td>
</tr> -->
</table>
<br>
				<input type="text" name="tempo" id="tempo" style="display: none;">
				<table class="table-responsive"  align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
				<tr > <th colspan=7><i>QUIZ QUESTIONS</i></th></tr>
				<tr>
					<th>S.no.</th>
					<th>Question</th>
					<th>Option 1</th>
					<th>Option 2</th>
					<th>Option 3</th>
					<th>Option 4</th>
					<th>Corect Option No.</th>
					<th></th>
				</tr>

				

				

				<tr>
					<td name="new_sno" id="new_sno"></td>

					<td><input type="text" name="n1" id="new_name"    placeholder="Enter data and Click Add"></td>
					<td><input type="text" name="n2" id="new_country" placeholder="Enter data and Click Add"></td>
					<td><input type="text" name="n3" id="new_age"     placeholder="Enter data and Click Add"></td>

					<td><input type="text" name="n4" id="new_op3"     placeholder="Enter data and Click Add"></td>
					<td><input type="text" name="n5" id="new_op4"     placeholder="Enter data and Click Add"></td>
					<td><input type="text" name="n6" id="new_opc"     placeholder="Enter data and Click Add"></td>
					<td><input type="button" class="add" onclick="add_row();" value="Add to Quiz"></td>
				</tr>
				</table>
				<center>
					<br>
				<input type="submit" name="mybtn" style="color: blue;">
				<input type="reset" value="Reset all" style="color: red;">
			</div>
			</form>

	</body>
</html>