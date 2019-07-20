<html>
<body>
<?php
require ('aheader.html');

if(isset($_POST['submitted'])){
$dbc = mysqli_connect('localhost','root','');

mysqli_select_db($dbc,'myform');
$problem = FALSE;

if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['studentid']) && !empty($_POST['password'])){
	$fullname = trim($_POST['fullname']);
	$email = trim($_POST['email']);
	$studentid = trim($_POST['studentid']);
	$password = trim($_POST['password']);
}else{
	print '<p class="form" style="color:red;">Please fill up the registration form.</p>';
	$problem = TRUE;
}

if(!$problem){
	$query = "INSERT INTO students(entry_id, fullname,email,studentid,password,date_entered) VALUES(0,'$fullname','$email','$studentid','$password',NOW())";
	
	if(mysqli_query($dbc,$query)){
		print '<p class="form" style="color:green;">You have registered successfully!</p>';
	}else{
		print '<p class="form" style="color:red;">Could not register because:<br />'.mysqli_error().'.</p><p>The query was: '.$query.'</p>';
	}
}

mysqli_close($dbc);
}
?>
<div class="form">
<h1>Registration</h1>
<p>Please fill in the form below to register.</p>
<form action="aregister.php" method="post">

<input type="text" name="fullname" placeholder = "Full Name" size="40" maxsize="100" /><br /><br />

<input type="text" name="email" placeholder = "Email" /><br /><br />

<input type="text" name="studentid" placeholder= "Student ID" /><br /><br />

<input type="password" name="password" placeholder="Password" /><br /><br />

<input type="submit" name="submit" value="Register!"/>

<input type="hidden" name="submitted" value="true"/>

</form>

<p>Already have an account? <a href="aalogin.php">Login here</a>.</p>
</div>

</body>

</html>