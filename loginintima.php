<?php
require ('loginheader.php');
?>
<html>
<body>
<p class="intima"></p>
<p class ="header">INTIMA</p>
<p style="font-size: 20px"> The table below shows the members that are in INTIMA.</p>
<style type="text/css">
table{
	border-collapse: collapse;
	width: 100%;
	color: #d96459;
	font-family: Arial;
	font-size: 25px;
	text-align: left;
}
th{
	background-color: #d96459;
	color: white;
}
tr:nth-child(even){background-color: #f2f2f2}
</style>
<table>
<tr>
<th>Full Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Student ID</th>
</tr>
<?php
$dbc = mysqli_connect('localhost','root','');

mysqli_select_db($dbc,'voting');

$query = 'SELECT fullname,email, phone_number, studentid FROM vote WHERE club ="intima" ';

$result = mysqli_query($dbc,$query);

if ( mysqli_num_rows($result)> 0 ){
	while ($row = mysqli_fetch_array($result)){
		echo "<tr><td> ".$row['fullname']."</td><td>".$row['email']."</td><td>".$row['phone_number']."</td><td>".$row['studentid']."</td></tr><br>";
	}
	echo "</table>";
}else{
	echo "No members are in this club";
}

mysqli_close($dbc);

?>
<p style="font-size: 20px">Comments:</p>
<?php
$dbc = mysqli_connect('localhost','root','');

mysqli_select_db($dbc,'comments');

$query = 'SELECT fullname,comment FROM comment WHERE club ="intima" ';

$result = mysqli_query($dbc,$query);
if ( mysqli_num_rows($result)> 0 ){
	while ($row = mysqli_fetch_array($result)){
		echo $row['fullname'].": ".$row['comment']."<br>";
	}
}else{
	echo "No comment yet";
}

mysqli_close($dbc);

?>
</body>
</html>