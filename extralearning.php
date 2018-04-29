<!DOCTYPE html>
<html>
<head>
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
    <header>
        <div id="heading">Edu Portal</div>
        <div id="heading2">
        Lakshamanan(Faculty)
        </div>
    </header>
    <div class="box">
        <div class='content'>
    <table >
    
    <tr><th>Sl.No.</th><th>Course ID</th><th>Course Name</th><th>Extra Learning</th><th>Upload</th></tr>   
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
        <tr><input type='hidden' name='formname' value='extralearning'/>
        <td>".$sno."</td><td name='cid'><input type='radio' name='cid' value=".$row['cid'].">".$row['cid']."</td><td>".$row["coursename"]."</td><td><input type='file' name='myFile' id='myFile' value='".$row['cid']."'></td><td><input type='submit' name='submit' value='Upload'></td><td id='err'></td></tr>
        </form>";
    }
    closeconn($conn);
?>

    </table></div>
    </div>
</body>
</html>

