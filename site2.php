<html>
<?php
session_start();
?>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel = "stylesheet"   type = "text/css"   href = "tabcss.css" /> -->
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
      <a href="qmake.php">Quiz</a>
      <a href="#contact">Assignments</a>
      <a href="#about">Materials</a>
      <a href="#about">Extra-learning</a>
      <a href="score.php" class="active">Scores</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>

	 	<?php
	 		$servername = 'localhost';
		    $username = 'root';
		    $password = 'MySQL';
		    $dbname = 'quizzes';

		    // Create connection
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    // Check connection
		    if ($conn->connect_error) {
		        die('Connection failed: ' . $conn->connect_error);
		    } 
		    $qname=$_POST["name"];
		    $sql = "CREATE TABLE ".$qname." (qno INT,ques VARCHAR(50) , a VARCHAR(20),b VARCHAR(20),c VARCHAR(20),d VARCHAR(20),answer VARCHAR(20))";
			if ($conn->query($sql) === TRUE) {
			    echo "<script>alert('Table".$qname." created successfully!');</script>";
			} else {
			    echo "<script>alert('Error creating table: " . $conn->error."!');</script>";
			}


        	//$response = $conn->query($sql);

	 	?>

		<table class="main" class="table-responsive" align='center' cellspacing=2 cellpadding=5 border=1>
		<tr><td>
		Name : <?php echo $qname; ?><br>
		</td>
	</tr>
	<tr><td>
		Course : <?php echo $_POST['cid']; ?><br>
		</td>
	</tr>
		</table>
		
		<table class="main" class="table-responsive" align='center' cellspacing=2 cellpadding=5 border=1 style="margin-top: 50px;">
		<tr>
			<th>Question</th>
			<th>Option 1</th>
			<th>Option 2</th>
			<th>Option 3</th>
			<th>Option 4</th>
			<th>Corect Option No.</th>
		</tr>
		<?php
			$t=$_POST["tempo"]; 
			// echo "<p>".$t."</p><br><br>";
			
			for( $i = 2; $i<=$t+1; $i++ )
			{
				//$keysno='snoname'.$i;
				$keyname='namename'.$i; 
				$keycountry='countryname'.$i; 
				$keyage='agename'.$i;
				$keyop3='op3name'.$i;
				$keyop4='op4name'.$i;
				$keyopc='opcname'.$i;

$sql = "INSERT INTO ".$qname." (qno, ques, a,b,c,d,answer) VALUES (".($i-1).",'".$_POST[$keyname]."','".$_POST[$keycountry]."','".$_POST[$keyage]."','".$_POST[$keyop3]."','".$_POST[$keyop4]."','".$_POST[$keyopc]."')";

				if (mysqli_query($conn, $sql)) {
				    // echo "New record created successfully";
				} else {
				    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}


				if($_POST[$keyname]!="")
				{
					echo "<tr>";
					echo "<td>".$_POST[$keyname]."</td>";
					echo "<td>".$_POST[$keycountry]."</td>";
					echo "<td>".$_POST[$keyage]."</td>";
					echo "<td>".$_POST[$keyop3]."</td>";
					echo "<td>".$_POST[$keyop4]."</td>";
					echo "<td>".$_POST[$keyopc]."</td>";
					echo "</tr>";
					//echo "<br><br>";
				}
				
			}
		?>
		 
		</table>
		
	  </body>
 </html> 