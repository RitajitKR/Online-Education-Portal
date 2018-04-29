<?php
include 'dbconnection.php';
$conn=openconn();
if(isset($_POST['submit']))
{
    $marks=$_POST['marks'];
    $regno=$_POST['regno'];
    $sql="update student set assignmentscore=$marks where regno='$regno'";
    $result=$conn->query($sql) or die($conn->error);
    if ($result==1){
         echo "<script>alert('Marks Updated Succesfully');window.history.back();</script>";
    }
    else{
        echo "Error in updation";
    }
}
closeconn($conn);
?>