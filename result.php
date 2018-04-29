<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title></title>
	
		<script type="text/javascript">window.history.forward(1);</script>
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
        <button class="btn" onclick="window.location.href='logoutct.php'" style="float: right;right: 0px;padding: 5px; margin-top: 1.5em;margin-bottom: 1.5em;margin-right: 2px;"><em><?php echo $_SESSION['login_user']; ?> </em><br> Sign Out</button>
      </div>
    </div>

    <!-- <div class="topnav" id="myTopnav">
      <a href="#home" class="active">Home</a>
      <a href="">Quiz</a>
      <a href="#contact">Assignments</a>
      <a href="#about">Materials</a>
      <a href="#about">Extra-learning</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div> -->
  </div>
	<center>

	<div class="main" align="center">
		<button onclick="window.location.href='studhome.php'" >Go to Home</button><br><br>

	<?php
		//session_start();
		 //print_r($_SESSION['login_user']);

		echo "Correct answers : ".$_SESSION["rt"]."<br>";
        echo "Wrong answers: ".$_SESSION["wr"]."<br>";
        echo "Unanswered : ".$_SESSION["un"]."<br>";
        echo "<br>SCORE = ".$_SESSION["rt"]."<br>";
        //echo "<br><br><button onclick='myFunction()'>Go to Home</button>";
        //echo "<br>Attempts:".$_SESSION["attempt"];
        echo "<script>console.log('".$_SESSION['login_user']."')";
        //DB
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
		$marks=$_SESSION["rt"]*10;
		///DB
		$sql = "insert into scores values('CSE1001','".$_SESSION['login_user']."','$marks')";

				if (mysqli_query($conn, $sql)) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}



        //session_destroy();

	?>
	<br>

	
	<script>
	function myFunction() {
	    alert("iuhjn");
	    // <?php //session_destroy(); ?>
	    window.location.href='studhome.php';
	}
	</script>
	</div>

</body>
</html>