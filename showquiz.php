<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "MySQL";
$dbname = "quizzes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//SELECT * FROM `quiz1` ORDER BY RAND() LIMIT 2;
$sql = "SELECT qno, ques, a,b,c,d FROM quiz1 ORDER BY rand() LIMIT 3";
$result = $conn->query($sql);
$i=0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br> qnum: ". $row["qno"]. " - qss: ". $row["ques"]. " " . $row["a"] . "<br>";
        $i=$i+1;
        echo "(".$i.") ".$row['ques']."?<br>";
        
        echo "<input type='radio' name=optfor".$row["qno"]." value='".$row["a"]."'>".$row["a"]."<br>";
        echo "<input type='radio' name=optfor".$row["qno"]." value='".$row["b"]."'>".$row["b"]."<br>";
        if($i<3) echo "<button id='next".$i." class='next btn btn-success' type='button' >Next</button>";
        else echo "<button id='next".$i." class='next btn btn-success' type='button' >Finish</button>";
        }
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>