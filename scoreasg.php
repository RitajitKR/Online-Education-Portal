<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>Scores</title>
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
	<script src="flotr2.min.js"></script> 
	<meta charset="utf-8">

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
      <a href="#home" class="active">Home</a>
      <a href="shoqq1.php">Quiz</a>
      <a href="#contact">Assignments</a>
      <a href="#about">Materials</a>
      <a href="#about">Extra-learning</a>
      <a href="score.php">Scores</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
  

	<div class="main">
		<!-- <form style='order-color: blue; border: 10;border-style: solid;border-width: 1px;display:none;' role='form' id='scoreform' method='post' action=''>
		<input type="text" name="" placeholder="CourseId">
		<input type="text" name="" placeholder="Reg.No.">
		<input type = "submit" id="sub" value = " Submit " class=".btn-primary" style="display: block;" />
		</form> -->
		<form action = "" method = "post">
                  <label>Course ID  :</label><input type = "text" name = "cid" class = "box"/><br /><br />
                  <!-- <label>Reg.No.  :</label><input type = "text" name = "rid" class = "box" /><br/><br /> -->
                  <input type = "submit" value = " Submit " class=".btn-primary" onclick="gra()" /><br />
         </form>
         
		
	</div>

	
	
	<!-- <script src="flotr2.min.js"></script> -->


	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
	$servername = 'localhost';
	$username = 'root';
	$password = 'MySQL';
	$dbname = 'logtable';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	} 
	$courseid=$_POST['cid'];
	$regno=$_SESSION['login_user'];//$_POST['rid'];
	$avg="SELECT avg(assignmentscore) as avgg from student,course where courseid='".$courseid."'";
	$sql = "SELECT assignmentscore FROM student where regno='".$regno."'";
	$m=0;
	$response = $conn->query($sql);

	if ($response->num_rows > 0) 
       {
        // output data of each row
            while($result = $response->fetch_assoc())
           
           {
           	// echo "--".$result['marks'];  
           	$m=$result['assignmentscore'];

           }
       }
       $response = $conn->query($avg);
	if ($response->num_rows > 0) 
       {
        // output data of each row
            while($result = $response->fetch_assoc())
           
           {
           	// echo "--".$result['avgg'];
           	$a=$result['avgg'];

           }
       }
       echo "<div id='mssg'>
		<fieldset>
			<br>
			<p> Your Score =".$m."<br>Class Avg=".$a."</p>
			
		</fieldset>
	</div>";
       echo "<button onclick='gra()' id='gb'>Graph</button>";
}
	?>


<script type="text/javascript">
	function gra()
	{
		//alert("HH");
		mm();
		document.getElementById("mssg").style.display="none";
		document.getElementById("gb").style.display="none";
	}


	function mm()
	{
		//alert('dd');	
		//var wins = [[[0,13],[1,11],[2,15],[3,15],[4,18],[5,21],[6,28]]];
		var wins2 = [[[0,<?php echo $m ?>]],[[1,<?php echo $a ?>]]];
		var teams = [
		    [0, "Your Score-<?php echo $m ?>"],
		    [1, "Class Avg-<?php echo $a ?>"],
		    
		];

				Flotr.draw(document.getElementById("chart"), wins2, {
		    title: "Relative Performance",
		    colors: ["#89AFD2", "#1D1D1D"],
		    bars: {
		        show: true,
		        barWidth: 0.5,
		        shadowSize: 0,
		        fillOpacity: 1,
		        lineWidth: 0
		    },
		    yaxis: {
		        min: 0,
		        tickDecimals: 0
		    },
		    xaxis: {
		        ticks: teams
		    },
		    grid: {
		        horizontalLines: false,
		        verticalLines: false
		    }
		});

	}


</script>
<div id='chart' style="width:600px;height:300px;"></div>

</body>
</html>