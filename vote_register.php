<?php

include("loginheader.php");

if(isset($_POST['submitted'])){
$dbc = mysqli_connect('localhost','root','');

mysqli_select_db($dbc,'voting');
$problem = FALSE;

if (!empty($_POST['fullname']) && !empty($_POST['email']) &&!empty($_POST['phone_number'])&& !empty($_POST['studentid'])){
	$fullname = trim($_POST['fullname']);
	$email = trim($_POST['email']);
	$studentid = trim($_POST['studentid']);
	$phone_number = trim($_POST['phone_number']);
}else{
	print '<p class="form" style="color:red;">Please fill up the registration form.</p>';
	$problem = TRUE;
}

if(!$problem){
	$club =$_POST['clubs'];
	$query = "INSERT INTO vote(entry_id, fullname,email,phone_number,studentid,club,date_entered) VALUES(0,'$fullname','$email','$phone_number','$studentid','$club',NOW())";
	
	if(mysqli_query($dbc,$query)){
		print '<p class="form" style="color:green";>You have registered successfully in the club!</p>';
	}else{
		print '<p class ="form" style="color:red;">Could not register because:<br />'.mysqli_error().'.</p><p>The query was: '.$query.'</p>';
	}
}

mysqli_close($dbc);
}
?>
<div class="form">
<h1>Registration</h1>
<p>Please fill in the form below to register.</p>
<form action="vote_register.php" method="post">

<input type="text" name="fullname" placeholder = "Full Name" size="40" maxsize="100" /><br /><br />

<input type="text" name="email" placeholder = "Email" /><br /><br />

<input type="text" name="phone_number" placeholder= "Phone Number" /><br /><br />

<input type="text" name="studentid" placeholder= "Student ID" /><br /><br />

<p>Club:</p>
<select name="clubs">
  <option value="badminton">Badminton Club</option>
  <option value="football">Football Club</option>
  <option value="INTIMA">INTIMA</option>
</select><br /><br />

<input type="submit" name="submit" value="Submit"/>

<input type="hidden" name="submitted" value="true"/>

</form>

</div>

</body>

</html>