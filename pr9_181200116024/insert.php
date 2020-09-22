<?php

if(isset($_POST['cancel'])){
	header("Location: index.php");
}
if(isset($_POST['username'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['gender'])&&isset($_POST['password'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user_login_register";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$gen = $_POST['gender'];
	$pass = $_POST['password'];
	$sql = "INSERT INTO userdetails (username, email, name, password, gender) VALUES ('$username','$email','$name','$pass','$gen')";

	if (mysqli_query($conn, $sql)) {
	  header("location: index.php");
	}
} else {
	echo("<h3 align='center' style='color:red'>All fields are required!</h3>");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Insert | 181200116024</title>
</head>
<body>
	<div align="center">
		<h1>Add new user</h1>
	</div>\
	<form method="post" action="insert.php">
		<table align="center">
		<tr>
			<td>Username : </td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Gender : </td>
			<td><input type="radio" name="gender" value="Male"/><span>Male</span> <input type="radio" name="gender" value="Female"/><span>Female</span></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="Password" name="password"></td>
		</tr>
		<tr>
			<td><a href="login.html">Already Registered ?</a></td>
			<td><input type="submit" name="submit" value="Submit"> <input type="submit" name="cancel" value="Cancel"></td>
		</tr>
		</table>
	</form>
</body>
</html>