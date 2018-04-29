<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'MySQL');
   define('DB_DATABASE', 'quizzes');
   $db1 = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   //echo "HIIHIHI";
   
   $db = mysqli_connect('localhost','root','MySQL','logtable');
?>