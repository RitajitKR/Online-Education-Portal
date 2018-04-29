<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
				<button class="btn" style="float: right;right: 0px;padding: 5px; margin-top: 1.5em;margin-bottom: 1.5em;margin-right: 2px;">Sign Out</button>
			</div>
		</div>

		<div class="topnav" id="myTopnav">
		  <a href="#home" class="active">Home</a>
		  <a href="#Quiz">Quiz</a>
		  <a href="#contact">Contact</a>
		  <a href="#about">About</a>
		  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
	</div>

</body>
</html>