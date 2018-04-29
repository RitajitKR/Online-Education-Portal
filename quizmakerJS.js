function delete_row(no)
{
	//document.getElementById("row"+no+"").outerHTML="";
	document.getElementById("new_sno"+no+"").innerHTML="0";
	document.getElementById("row"+no+"").style.display="none";
	document.getElementById("name_row"+no+"").value="";
	
	
	//document.write("ppp");
}

function add_row()
{
 var new_sno=document.getElementById("new_sno").value;
 var new_ques=document.getElementById("new_ques").value;
 var new_op1=document.getElementById("new_op1").value;
 var new_corr=document.getElementById("new_corr").value;
 
 var prevques=document.getElementById("new_ques").value;
 var prevop1=document.getElementById("new_op1").value;
 var prevcorr=document.getElementById("new_corr").value;
 

 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var rr=table_len-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name='snoname"+table_len+"' id='new_sno"+table_len+"'>"+rr+"</td><td><input type='text' name='namename"+table_len+"'id='name_row"+table_len+"'></td><td>  <input type='text' name='countryname"+table_len+"'id='country_row"+table_len+"'> </td><td> <input type='text' name='corrname"+table_len+"'id='corr_row"+table_len+"'> </td><td><input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'</td></tr>";
 
 var newnamefield=document.getElementById("name_row"+table_len);
 var newcountryfield=document.getElementById("country_row"+table_len);
 var newagefield=document.getElementById("age_row"+table_len);
 
 newnamefield.value=prevname;
 newcountryfield.value=prevcountry;
 newagefield.value=prevage;
 
 document.getElementById("new_ques").value="";
 document.getElementById("new_op1").value="";
 document.getElementById("new_corr").value="";
 
 document.getElementById("tmp").value=table_len;
}