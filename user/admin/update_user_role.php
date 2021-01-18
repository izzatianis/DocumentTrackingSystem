<?php 
session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['admin_submit'])) {
      if (empty($_POST['input_user'])) {
        $error = "No name entered";
      }
      else{
        include "C:\\xampp\htdocs\DTS2\includes\connect.php";
        // Define $username and $password
        $user = $_POST['input_user'];
        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT * FROM users where name = '$user'";
        $result = mysqli_query($conn,$query); 
        while ($row = mysqli_fetch_array($result)) {
            echo "Name: " . $row['name'] .  nl2br("\n");
            echo "Role: " . $row['role_name'] .  nl2br("\n");
            echo "Staff ID: " . $row['staff_id'] . nl2br("\n");
            $_SESSION['uname'] = $row['name'];
            $_SESSION['role_name'] = $row['role_name'];
            $_SESSION['staff_id'] = $row['staff_id'];
        }
      mysqli_close($conn); // Closing Connection
      }
    } 
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="update_user_role_result.php" method="POST">
    <button type="submit" name="update_user_button">Update role</button>
    <input type="" name="user_role_update" placeholder="Update role here">
  </form>
</body>
</html>








