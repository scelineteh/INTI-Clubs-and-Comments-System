<?php
include("auth.php");
?>
<html>
<head>
<title>INTI INTERNATIONAL COLLEGE PENANG CLUBS AND COMMENT SYSTEM</title>
<link rel="stylesheet" href="a.css">
</head>
<body>
<h1  class="small" align="center">INTI INTERNATIONAL COLLEGE PENANG<br />CLUBS AND COMMENT SYSTEM</h1>
<div class="navbar">
  <a href="loginabout.php">About</a>
  <a href="loginhome.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Clubs
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="loginbadminton.php">Badminton Club</a>
      <a href="loginfootball.php">Football Club</a>
      <a href="loginintima.php">INTIMA</a>
    </div>
	</div>
	<div class ="nav-right">
		<div class="dropdown">
			<button class ="dropbtn"><?php echo 'Welcome ',$_SESSION['studentid'];?>
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="aindex.php">Dashboard</a>
				<a href="alogout.php">Log Out</a>
			</div>
		</div> 
	</div>
</div>
</body>
</html>