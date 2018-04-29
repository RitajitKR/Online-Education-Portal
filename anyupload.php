<?php

if(isset($_POST['submit']))
{
    $location=$_POST['formname']."/";
    $flag=0;
    $uploadedfile = $location.basename($_FILES['myFile']['name']);
    $filesize=$_FILES['myFile']['size'];
    if($filesize>5242880)
    {
        echo "file size is greater than 5 MB";
        $flag=1;
    }
    
    //checking for file extension - only docx files allowed
    
    $allowedextension=array("docx","doc","pdf");
    $filename=$_FILES['myFile']['name'];
    $filetype=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    if(in_array($filetype, $allowedextension)==false)
    {
        echo "Only docx,doc,pdf files are allowed";
        $flag=1;
    }
    
    //checking if file already exists 
    
    if(file_exists($uploadedfile))
    {
        echo "<script>alert('File Already Exists');window.history.back();</script>";
        $flag=1;
    }
    
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
