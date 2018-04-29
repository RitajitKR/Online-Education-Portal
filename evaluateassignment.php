<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
    <link rel="stylesheet" type="text/css" href="first.css">
    <script>
        function validate(){
            var cid=document.getElementById("cid").value;
        if (cid==""){
        return false;}
        return true;
        }
    </script>
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
        <button class="btn" 
        onclick="window.location.href='logoutct.php'"><em><?php echo $_SESSION['login_user'];?> </em><br> Sign Out</button>
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
        <div class='content'>
    <table >
    
    <tr><th>Sl.No.</th><th>Reg No</th><th>Solution Link</th><th>Marks</th><th>Submit</th></tr>   
    <?php

    include 'dbconnection.php';
    $conn=openconn();
    $sql="select * from (enrollment join course on enrollment.cid=course.courseid and course.courseid='CSE1001') join faculty on faculty.facid=course.facid ";
    $result=$conn->query($sql) or die($conn->error);
    //$row=$result->fetch_assoc();
    //print_r($row);
    $dir_path = "Elearn/";
$extensions_array = array('pdf','doc','docx');
    
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
    $regno=$_SESSION['login_user'];//$_POST['rid'];
    $sql = "SELECT marks FROM scores where regno='".$regno."'";


    $sno=0;
    while($row=$result->fetch_assoc()){
        $sno+=1;
        echo"
        <form method='post' action='uploadmarks.php' onsubmit='return validate()'>
        <tr>
        <tr>

        <td>".$sno."</td><td name='regno'><input type='radio' name='regno' value=".$row['regno'].">".$row['regno']."</td>"."<td><a href='studentupload/".$row['regno'].".pdf' target='_blank'>Solution View</a><td><input type='text' name='marks'></td><td><input type='submit' name='submit' value='Upload'></td></tr>
        </form>"
        ;
    }
    closeconn($conn);
?>

    </table></div>
    </div>
</body>
</html>
