<?php

if(isset($_POST['cancel'])){
	header("Location: index.php");
}

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
$id= $_GET['id'];
if(isset($_POST['submit'])){
	if(isset($_POST['username'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['gender'])&&isset($_POST['password'])){
			$username = $_POST['username'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$gen = $_POST['gender'];
			$pass = $_POST['password'];
			$sql = "UPDATE userdetails SET username='".$username."',name='".$name."',email='".$email."',gender='".$gen."',password='".$pass."' WHERE id='".$id."'";
			print $sql;
			if (mysqli_query($conn, $sql)) {
			  header("location: index.php");
			}}
	else{
		echo("<h3 align='center' style='color:red'>All fields are required!</h3>");
	}	
} 
$sql1 = "SELECT * FROM userdetails WHERE id='" . $id . "'";
$result1 = mysqli_query($conn, $sql1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Edit | 181200116024</title>
</head>
<body>
	<div align="center">
		<h1>Update user</h1>
	</div>\
	<form method="post">
		<?php while ($res = mysqli_fetch_array($result1)) { ?>
		<table align="center">
		<tr>
			<td>Username : </td>
			<td><input type="text" name="username" value="<?php echo $res['username']; ?>"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="email" name="email" value="<?php echo $res['email']; ?>"></td>
		</tr>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name" value="<?php echo $res['name']; ?>"></td>
		</tr>
		<tr>
			<td>Gender : </td>
			<td><input type="radio" name="gender" value="Male" <?php if($res['gender']=="Male"){ echo "checked";}?>/><span>Male</span> <input type="radio" name="gender" value="Female"<?php if($res['gender']=="Female"){ echo "checked";}?>/><span>Female</span></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="text" name="password" value="<?php echo $res['password']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update"> <input type="submit" name="cancel" value="Cancel"></td>
		</tr>
		<?php } ?>
		</table>
	</form>
</body>
</html>