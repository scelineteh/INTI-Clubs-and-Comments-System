<?php
$dbc = mysqli_connect('localhost','root','');
if ($dbc){
	print '<p>Successfully connected to MySQL!</p>';
	//mysqli_close($dbc);
	if (mysqli_query($dbc,'CREATE DATABASE voting')) {
		print '<p>The database has been created!</p>';
	}
	else{
		print '<p style ="color:red;">Could not create the database because:
		<br />'.mysqli_errno($dbc).'.</p>';
	}
	
	if (mysqli_select_db($dbc,'voting')){
		print '<p> The database has been selected.</p>';
	}
	else{
		print '<p style= "color:red;">Could not select the database because: 
		<br />'.mysqli_errno($dbc) .'.</p>';
	}
	mysqli_close($dbc);
}

else{
	print '<p style= "color:red;">Could not connect to MySQL: '
	.mysqli_errno ($dbc).'</p>';
}
?>
