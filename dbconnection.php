<?php 
 
function openconn()
{
	$host="localhost";
	$user="root";
	$pass="MySQL";
	$db="logtable";
	$conn = new mysqli($host,$user,$pass,$db) or die("Unable to connect".$conn->err);
	return $conn;
}
function closeconn($conn)
{
	$conn->close();
}
?>