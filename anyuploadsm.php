<?php

if(isset($_POST['submit']))
{
    //$location = "studentupload/";
    //Session Start
    session_start();
    $c=$_POST['cid'];
    $d=$_SESSION['login_user'];
    $location = "matview/";
    $flag=0;
    $uploadedfile = $location.basename($_FILES['myFile']['name']);
    $filesize=$_FILES['myFile']['size'];
    if($filesize>5242880)
    {
        echo "file size is greater than 5 MB";
        $flag=1;
    }
    
    //checking for file extension - only docx files allowed
    include 'dbconnection.php';
    $conn=openconn();
    $sql="select * from (enrollment join course on enrollment.cid=course.courseid) join faculty on faculty.facid=course.facid";
    $result=$conn->query($sql) or die($conn->error);
    $row=$result->fetch_assoc();  
    $allowedextension=array("docx","doc","pdf");
    $filename=$_FILES['myFile']['name'];
    $filetype=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    if(in_array($filetype, $allowedextension)==false)
    {
        echo "Only docx,doc,pdf files are allowed";
        $flag=1;
    }


    //renaming
    //$newfilename = md5($file_basename) . $file_ext;
    $newname = $row['cid']."_".$row['facid']."_".$row['fname']."_SM".".$filetype"; 

    $uploadedfile = 'matview/'.$newname;
    //move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
    
    //checking if file already exists 
    
    /*$c=0;
    while(file_exists($uploadedfile))
    {
        $c=$c+1;
        $newname = $row['cid']."_".$row['facid']."_".$row['fname']"_SM(".$c.").$filetype"; 

        $newname = "CSE1001_1234_Senthilnathan_SM(".$c.").$filetype";
        $uploadedfile = 'matview/'.$newname;
        break;
    }*/

    if(file_exists($uploadedfile))
    {
        $i= 1;
        
        while (file_exists($uploadedfile))
        {
            // get file extension
            $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
            
            // get file's name
            $filename = pathinfo($uploadedfile, PATHINFO_FILENAME);
            
            // add and combine the filename, iterator, extension
            $new_filename = $filename . '-' . $i . '.' . $extension;
            
            // add file name to the end of the path to place it in the new directory; the while loop will check it again
            $uploadedfile = $location . $new_filename;
            $i++;
            
        }
    }
    /*if(file_exists($uploadedfile))
    {
        echo "File Already Exists";
        $flag=1;
    }*/
    /*$fileName = $_FILES['file']
    function update_file_name($file) 
    {
    $pos = strrpos($file,'.');
    $ext = substr($file,$pos); 
    $dir = strrpos($file,'/');
    $dr  = substr($file,0,($dir+1)); 

    $arr = explode('/',$file);
    $fName = trim($arr[(count($arr) - 1)],$ext);

    $exist = FALSE;
    $i = 2;
    while(!$exist){
        if(file_exists($file.$i)||file_exists($file)){
          continue;
        }else{
          $exist = TRUE;
          $file = $dr.$fName.$i.$ext;
        }
        $i++;
    }

    return $file;
    }*/
    //uploading file to directory on the server 
    if($flag==0)
    {
        if(move_uploaded_file($_FILES['myFile']['tmp_name'],$uploadedfile))
        {
            echo "<script>alert('File Upload Successful');window.history.back();</script>";
        }
    }
    
}
?>
