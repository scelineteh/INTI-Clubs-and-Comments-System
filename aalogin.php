<?php
require ('aheader.html');

require ('connectsql.php');
session_start();
mysqli_select_db($dbc,'myform');
$problem = FALSE;

if(isset($_POST['studentid'])){
	$studentid = $_POST['studentid'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM students WHERE studentid='$studentid' and password='$password'";
	$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	$rows = mysqli_num_rows($result);
	if ($rows ==1){
		$_SESSION['studentid'] = $studentid;
		header("location:aindex.php");
	}else{
		echo "<div class ='form' style=color:red>
		<h1>Username or password is incorrect.</h1></div>";
		print "<div class='form'><p>Click <a href=aalogin.php>here</a> to login again.</p></div>";
	}
}else{
?>
<html>
<body>

<div class="form">
<h1>Login</h1>
<form action="aalogin.php" method="post">

<input type="text" name="studentid" placeholder= "Student ID" /><br /><br />

<input type="password" name="password" placeholder="Password" /><br /><br />

<input type="submit" name="submit" value="Login"/>

<input type="hidden" name="submitted" value="true"/>

</form>

<p>Don't have an account? <a href="aregister.php">Register here</a>.</p>
</div>
<?php } ?>
</body>

</html>