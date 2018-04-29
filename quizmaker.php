
<html>
	<head>
		<title>QUIZ Maker</title>
		<link rel = "stylesheet"   type = "text/css"   href = "tabcss.css" />
		<script type="text/javascript" src="quizmakerJS.js"></script>
	</head>
	<body>
		
		<div id="wrapper"  >
			<form action="site2.php" method="post">
			<div class="container" >
			<center>
				<table  class="table-responsive"  align='center' cellspacing=2 cellpadding=5 id="data_table0" border=1>

<tr>
<td>Name</td>
<td><input type="text" name="name" id="name" pattern="[A-Za-z]{1,100}" required title="No Number Allowed"></td>
</tr>

<tr>
<td>Date Of Birth</td>
<td><input type="date" name="dob" id="dob">

</tr>

<tr>
<td>Father's name</td>
<td><input type="text" name="fname" id="fname" pattern="[A-Za-z]{1,100}" title="No Number Allowed"></td>

</tr>

<tr>
<td> Mother's name </td>
<td> <input type="text" name="mname" id="mname" pattern="[A-Za-z]{1,100}"  title="No Number Allowed"></td>
</tr>

<tr>
<td> City </td>
<td> <input type="text" name="city" id="city" pattern="[A-Za-z]{1,100}" required title="No Number Allowed"></td>
</tr>


<tr>
<td> Mobile Number </td>
<td><input type="text" name="mob" id="mob" pattern="[0-9]{10,10}" required title="10 dig mob"></td>
<label id="merr" class="err"></label>
</tr>

</table>
				<input type="text" name="tmp" id="tmp" style="display:none" value="0">
				<table class="table-responsive"  align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
				<tr > <th colspan=5><i>RESUME DATA</i></th></tr>
				<tr>
					<th>S.no.</th>
					<th>Qualification</th>
					<th>Credential</th>
					<th>Institution</th>
					<th></th>
				</tr>

				

				

				<tr>
					<td name="new_sno" id="new_sno"></td>
					<td><input type="text" name="n1" id="new_ques"    placeholder="Enter data and Click Add"></td>
					<td><input type="text" name="n2" id="new_op1" placeholder="Enter data and Click Add"></td>
					<td><input type="text" name="n3" id="new_corr"     placeholder="Enter data and Click Add"></td>
					<td><input type="button" class="add" onclick="add_row();" value="Add to Resume"></td>
				</tr>
				</table>
				<center>
				<input type="submit" name="mybtn" >
				<input type="reset" value="Reset all">
			</div>
			</form>
		</div>

	</body>
</html>