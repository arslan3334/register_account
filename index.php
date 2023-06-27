<?php

extract($_REQUEST);
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTER FORM</title>
	<script type="text/javascript">

		function addUser(){

			var data = document.getElementsByTagName('input');

			var name = data[0].value;
			var email    = data[1].value;
			var passwords  = data[2].value;
			var country    = document.getElementById('country').value;

			
			var obj;
			if (window.XMLHttpRequest) {
				obj = new XMLHttpRequest();
			}else{
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}

			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200) {
					document.getElementById('showresponse').innerHTML = obj.responseText;
				}



			}

			// obj.open("GET","ajax_Process.php?action=add_user&name="+name+"&email="+email+"&password="+passwords+"&phone_number="+phone+"&address="+address);

			obj.open("POST","dataprocess.php")
			obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
			obj.send("action=givendata&email=" +email+"&name="+name+"&passwords="+passwords+"&country="+country);
		}

function checkemail(){
var data2 = document.getElementsByTagName('input');
var cemail    = data2[1].value;

var obj;
			if (window.XMLHttpRequest) {
				obj = new XMLHttpRequest();
			}else{
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}

			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200) {
					document.getElementById('showresponse2').innerHTML = obj.responseText;
				}


				if (obj.responseText=="<h1 style='color:red' >email is taken already</h1>") {

					document.getElementById('btn').style.display = "none";

				}


				else{
					document.getElementById('btn').style.display = "block";
				}
			}

			

			obj.open("POST","dataprocess.php")
			obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
			obj.send("action=checkemail&cemail=" +cemail);



}

function showcity(){

var country = document.getElementById('country').value;
if (country== "") {
				document.getElementById('showcity').innerHTML= "";
				return 1;
			}


var obj;
			if (window.ActiveXObject) {
				obj = new ActiveXObject("Microsoft.XMLHTTP");
			}else{
				obj = new XMLHttpRequest();
			}

			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200) {

					document.getElementById('showcity').innerHTML = obj.responseText;
				}

           
            

			}

			obj.open("POST",'dataprocess.php');
			obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
			obj.send("action=showcity&country="+country);




}


	</script>
</head>
<body style="background-color: yellow">
	<center>
<h1 style="color: green">ENTER YOUR DATA  TO GET REGISTERED</h1>

<div style="border: 1px solid;width: 30%;text-align: center;padding: 10px;background-color: red;color: white">
	 ENTER NAME <input type="text" id="first_name" placeholder="Enter Name" required="" />
	<br/><br/>
ENTER EMAIL	<input onblur="checkemail()" type="text" id="email" placeholder="Enter Email Address" required="" />
	<br/><br/>
ENTER PASSWORD<input type="password" id="password" placeholder="Enter password" required="" />
	<br/><br/>
<select id="country" onchange="showcity()" required="">
	<option id="" value="">--select country--</option>
	<option id="1" >pakistan</option>
	<option id="2" >india</option>
	<option id="3">iran</option>

</select>
<br/><br/>

<div id="showcity">
</div>


	<br/><br/>
	<button id="btn" onclick="addUser()">Add User</button>

</div>
<div id="showresponse">
	
</div>

<div id="showresponse2">
	
</div>

</center>

</body>
</html>