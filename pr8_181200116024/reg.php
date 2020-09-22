<?php
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
  echo "New record created successfully";
  header("location: login.html");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>