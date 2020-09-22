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

session_start();
$email = $_POST['email'];  
$password = $_POST['password'];  
  
    $sql = "select * from userdetails where email = '$email' and password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";
        $_SESSION['mail'] = $email;
        header("location: main_page.php"); 
    }  
    else{  
        echo "<h1> Login failed. Invalid email or password.</h1>";  
    } 
mysqli_close($conn);     
?> 