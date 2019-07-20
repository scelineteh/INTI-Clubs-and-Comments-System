<?php

include("loginheader.php");
if(isset($_POST['submitted'])){
	$dbc = mysqli_connect('localhost','root','');

	mysqli_select_db($dbc,'comments');
	$problem = FALSE;
	
	if (!empty($_POST['fullname'])&&isset($_POST['club']) && !empty($_POST['comment'])){
		$fullname = trim($_POST['fullname']);
		$club = trim($_POST['club']);
		$comment= trim($_POST['comment']);
	}else{
		echo'<p class ="form" style ="color:red;" >You have to fill up the form to continue</p>';
		$problem = TRUE;
	}
if (!$problem){
	$club = $_POST['club'];
	$query = "INSERT INTO comment(entry_id, fullname, club,comment, date_entered) VALUES (0,'$fullname', '$club', '$comment',NOW())";
	if (mysqli_query($dbc, $query)){
		print '<p class ="form" style="color:green;">You have commented successfully!</p>';
	}else{
		print '<p class ="form" style="color:red;">Could not register because:<br />'.mysqli_error().'.</p><p>The query was: '.$query.'</p>';
	}
}
}
?>
<html>
<body>
<div class="form">
<h1>Comments</h1>
<p>Fill up the form below to comment on a club.</p>
<form action ="comment.php" method ="post">
<input type="text" name="fullname" placeholder = "Full Name" size="40" maxsize="100" /><br /><br />
<p>Choose the club below:<br />
<input type="radio" name ="club" value = "badminton">Badminton Club<br />
<input type ="radio" name="club" value = "football">Football Club<br />
<input type ="radio" name = "club" value="INTIMA">INTIMA<br />
<p>Comment :<br /> <textarea name ="comment" cols=40" rows="6"></textarea></p></p>
<input type="submit" name="submit" value="Next"/>
<input type="hidden" name="submitted" value="true"/>
</form>
</div>
</body>
</html>


