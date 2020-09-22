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
$sql = "SELECT * FROM userdetails";
$result = mysqli_query($conn, $sql)
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin panel | 181200116024</title>
</head>
<body>
	<h1 align="center">Welcome Admin</h1>
	<br>

	<p align="center"><strong>Add new user: </strong><a href="insert.php">Insert</a></p>
	<?php
		if(mysqli_num_rows($result) > 0){
			echo "<table border=1 align='center'>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Username</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Gender</th>";
                echo "<th>password</th>";
                echo "<th></th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo ('<td><a href="edit.php?id='.$row['id'].'">Edit</a>  <a href="delete.php?id='.$row['id'].'">Delete</a>');
     			echo ("</td>");
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
	?>
</body>
</html>