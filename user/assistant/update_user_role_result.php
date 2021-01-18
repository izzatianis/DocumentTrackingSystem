<?php 
session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['update_user_button'])) {
      if (empty($_POST['user_role_update'])) {
        $error = "No name entered";
      }
      else{
        include "C:\\xampp\htdocs\DTS2\includes\connect.php";
        // Define $username and $password
        $role = $_POST['user_role_update'];
        $user = $_SESSION['uname'];

        // SQL query to fetch information of registerd users and finds user match.
        //$query = "SELECT * FROM users where name = '$user'";
        $query = "UPDATE users SET role_name='$role' WHERE name='$user'";
        if ($conn->query($query) === TRUE) {
		  echo "Record updated successfully to " . $role;
		} else {
		  echo "Error updating record: " . $conn->error;
		}
      mysqli_close($conn); // Closing Connection
      }
    } 

    echo "<br><a href=../admin/>Menu</a>";

?>






