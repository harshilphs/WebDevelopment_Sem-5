<?php
session_start();
if(!isset($_SESSION['mail'])){
	header("location: login.html");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>main page</title>
</head>
<body>
	<h1 align="center">Welcome to main page</h1>
	<a href="logout.php" style="position: absolute; top: 25px; right: 50px; font-size: 20px"> Logout</a>
</body>
</html>