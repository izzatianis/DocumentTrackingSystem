<?php
session_start(); // Starting Session
  $error = ''; // Variable To Store Error Message
  if (isset($_POST['register_submit'])) {
    if (empty($_POST['new_name']) || empty($_POST['new_email']) || empty($_POST['new_staff_id']) || empty($_POST['new_password'])) {
      $error = "Form not filled";
    }
    else{
      include 'C:\\xampp\htdocs\DTS2\includes\connect.php';
      // Define $username and $password
      $username = $_POST['new_name'];
      $email = $_POST['new_email'];
      $staff_id = $_POST['new_staff_id'];
      $password = md5($_POST['new_password']);

      $query = "SELECT * FROM users"; 
      $result = mysqli_query($conn, $query); 
      $_SESSION['increment'] = FALSE;

      // SQL query to fetch information of registerd users and finds user match.
      $query = "INSERT INTO users (name, login, password, staff_id) VALUES ('$username','$email','$password', '$staff_id')";
      if ($conn->query($query) === TRUE) {
        echo "User registered, contact your admin to update your role" ;
        $_SESSION['increment'] = TRUE;
      } 
      else if (mysqli_errno($conn) == 1062) {
        print $email . " has already registered, contact your administrator";
      }
      else {
        echo "Error updating record: " . $conn->error;
      }

    }
    mysqli_close($conn); // Closing Connection
    echo "<br><a href=index.php>Login</a>";
  }
//empty($_POST['new_name']) || empty($_POST['new_email']) || empty($_POST['new_staff_id']) || empty($_POST['new_password'])