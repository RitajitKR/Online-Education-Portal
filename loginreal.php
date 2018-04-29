<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id,type FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo "<script>console.log('".$_SESSION['login_user']."')";
         echo $login_session;
         if($row['type']=='student')
         {header("location: studhome.php");}
       else {header("location: facultyhome.php");}
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

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
	<script type="text/javascript">
		var alertRedInput = "#8C1010";
var defaultInput = "rgba(10, 180, 180, 1)";

function userNameValidation(usernameInput) {
    var username = document.getElementById("username");
    var issueArr = [];
    if (/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(usernameInput)) {
        issueArr.push("No special characters!");
    }
    if (issueArr.length > 0) {
        username.setCustomValidity(issueArr);
        username.style.borderColor = alertRedInput;
        username.style.color=alertRedInput;
    } else {
        username.setCustomValidity("");
        username.style.borderColor = defaultInput;
        username.style.color=defaultInput;
    }
}

function passwordValidation(passwordInput) {
    var password = document.getElementById("password");
    var issueArr = [];
    if (!/^.{7,15}$/.test(passwordInput)) {
        issueArr.push("Password must be between 7-15 characters.");
    }
    if (!/\d/.test(passwordInput)) {
        issueArr.push("Must contain at least one number.");
    }
    if (!/[a-z]/.test(passwordInput)) {
        issueArr.push("Must contain a lowercase letter.");
    }
    if (!/[A-Z]/.test(passwordInput)) {
        issueArr.push("Must contain an uppercase letter.");
    }
    if (!/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(passwordInput)) {
        issueArr.push("Must contain special characters.");
    }


    if (issueArr.length > 0) {
        password.setCustomValidity(issueArr.join("\n"));
        password.style.borderColor = alertRedInput;
        password.style.color = alertRedInput;
    } else {
        password.setCustomValidity("");
        password.style.borderColor = defaultInput;
        password.style.color = defaultInput;
    }
}
</script>
</head>
<body >
	<div class="stick">
      <div class="hd">
        <div class="col-logo">
          EPo
        </div>
        <div class="col-name">
          EduPortal
        </div>
        
        <div class="col-usout">
          
        </div>
    </div>
  </div>
	
	<div class="main" style="width: 25%;margin-left: 500px;" align="center">
  		<div style = "width:100%; border-radius: 5px;  border: solid 1px #333333; background-color: white; box-shadow: 10px 10px 5px grey;top:50%" align = "left" >
            <div style = "background-color:blue; color:#FFFFFF; padding:3px; "><b>Login</b></div>
            
            <div style = "margin:30px; color: black" class='inv '>
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" id="username" name = "username" class = "box" value="" oninput="return userNameValidation(this.value)" required/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" id="password" class = "box" value="" oninput="return passwordValidation(this.value)" required /><br/><br />
                  <input type = "submit" value = " Submit " class=".btn-primary" /><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php error_reporting(0);echo $error; ?></div>
               
            </div>
            
         </div>

  

</div>
</body>
</html>