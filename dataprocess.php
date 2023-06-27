<?php
 extract($_REQUEST);
mysqli_report(MYSQLI_REPORT_OFF);
$connect = mysqli_connect("localhost",'root','','country_city');

if (mysqli_connect_error()) {
	die("<h1>Database Connection Failed!...</h1>");
}


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "checkemail") {

$query2 = "SELECT email FROM users WHERE email='$cemail';";

	$result2 = mysqli_query($connect,$query2);


	if ($result2->num_rows>0){

		echo"<h1 style='color:red' >email is taken already</h1>";

	}


}

else{



if (isset($_REQUEST['action']) && $_REQUEST['action'] == "givendata") {

if ($name==""||$email==""||$passwords==""||$country=="") {
	 echo "<h1 style='color:red'> ALL FIELDS ARE REQUIRED</h1>";
}



else{

$query = "INSERT INTO users (users.`fullname`,users.`email`,users.`pass`,users.`country`)

VALUES('$name','$email','$passwords','$country'); ";

	$result = mysqli_query($connect,$query);

	if ($result) {
		echo "<h1 style='color:green' > ACCOUNT REGISTERED SUCCESSFULLY</h1>";
	}


	else{

		echo "<h1 style='color:red' >REGISTERATION FAILED</h1>";
	}
}
}

}


if (isset($_REQUEST['action']) && $_REQUEST['action'] == "showcity") {


$query3 = "SELECT city_name FROM city WHERE countryname='$country';";

	$result3 = mysqli_query($connect,$query3);


	if ($result3->num_rows>0){


?>

<select id="city">
<?php
		while($show=mysqli_fetch_assoc($result3)){

echo "<option>".$show['city_name']."</option>";


		}


?>

</select>
<?php
	}


}


?>