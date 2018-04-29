
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
 var new_name=document.getElementById("new_name").value;
 var new_country=document.getElementById("new_country").value;
 var new_age=document.getElementById("new_age").value; 
 var new_op3=document.getElementById("new_op3").value;
 var new_op4=document.getElementById("new_op4").value;
 var new_opc=document.getElementById("new_opc").value;
 
 
 
 var prevname=document.getElementById("new_name").value;
 var prevcountry=document.getElementById("new_country").value;
 var prevage=document.getElementById("new_age").value;
 var prevop3=document.getElementById("new_op3").value;
 var prevop4=document.getElementById("new_op4").value;
 var prevopc=document.getElementById("new_opc").value;
 

 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var rr=table_len-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td name='snoname"+table_len+"' id='new_sno"+table_len+"'>"+rr+"</td><td><input type='text' name='namename"+table_len+"'id='name_row"+table_len+"'></td><td>  <input type='text' name='countryname"+table_len+"'id='country_row"+table_len+"'> </td><td> <input type='text' name='agename"+table_len+"'id='age_row"+table_len+"'> </td><td>"+"<input type='text' name='op3name"+table_len+"'id='op3_row"+table_len+"'> "+"</td><td>"+"<input type='text' name='op4name"+table_len+"'id='op4_row"+table_len+"'> "+"</td><td>"+"<input type='text' name='opcname"+table_len+"'id='opc_row"+table_len+"'> "+"</td><td><input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'</td></tr>";
 
 var newnamefield=document.getElementById("name_row"+table_len);
 var newcountryfield=document.getElementById("country_row"+table_len);
 var newagefield=document.getElementById("age_row"+table_len);
 var newop3field=document.getElementById("op3_row"+table_len);
 var newop4field=document.getElementById("op4_row"+table_len);
 var newopcfield=document.getElementById("opc_row"+table_len);
 document.getElementById("tempo").value=""+rr;
 
 newnamefield.value=prevname;
 newcountryfield.value=prevcountry;
 newagefield.value=prevage;
 newop3field.value=prevop3;
 newop4field.value=prevop4;
 newopcfield.value=prevopc;
 
 document.getElementById("new_name").value="";
 document.getElementById("new_country").value="";
 document.getElementById("new_age").value="";
 document.getElementById("new_op3").value="";
 document.getElementById("new_op4").value="";
 document.getElementById("new_op5").value="";
  
 //document.getElementById("tempo").value="ujnik";
 
}