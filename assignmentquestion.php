<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="struct2.css">
<!--   <script type="text/javascript">window.history.forward(1);</script>
 -->  <script type="text/javascript">
    
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
  </script>
    <link rel="stylesheet" type="text/css" href="first.css">
    <script>
        function validate(){
            var cid=document.getElementById("cid").value;
        if (cid==""){
        return false;}
        return true;
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
        onclick="window.location.href='logoutct.php'"><em><?php echo $_SESSION['login_user'];;?> </em><br> Sign Out</button>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="facultyhome.php" class="active">Home</a>
      <a href="qmake.php">Quiz</a>
      <a href="assignmentquestion.php">Assignments</a>
      <a href="#about">Materials</a>
      <a href="#about">Extra-learning</a>
      <a href="score.php">Scores</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>

        
    <div class="main">
        <div class='content'>
    <table> <!-- cellspacing=2 cellpadding=5 border=1> -->
    
    <tr><th>Sl.No.</th><th>Course ID</th><th>Course Name</th><th>Question File</th><th>Upload</th></tr>   
    <?php

    include 'dbconnection.php';
    $conn=openconn();
    $sql="select * from ((enrollment join course on enrollment.cid=course.courseid) join faculty on faculty.facid=course.facid) where faculty.facid='123'";
    $result=$conn->query($sql) or die($conn->error);
   // print_r($row);
    $sno=0;
    while($row=$result->fetch_assoc()){
        $sno+=1;
        echo "<form method='post' enctype='multipart/form-data' action='anyupload.php' onsubmit='return validate()'>
        <tr><input type='hidden' name='formname' value='assignmentquestion'/>
        <td>".$sno."</td><td name='cid'><input type='radio' name='cid' value=".$row['cid'].">".$row['cid']."</td><td>".$row["coursename"]."</td><td><input type='file' name='myFile' id='myFile' value='".$row['cid']."'></td><td><input type='submit' name='submit' value='Upload'></td><td id='err'></td></tr>
        </form>";
    }
    closeconn($conn);
?>

    </table></div>
    </div>
</body>
</html>

