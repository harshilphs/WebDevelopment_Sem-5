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
$id = $_GET["id"];
$sql = "DELETE FROM userdetails WHERE id='" . $id . "'";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>