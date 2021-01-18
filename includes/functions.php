<?php
class Login{
  public function LoginSystem(){
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
      if (empty($_POST['login']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
      }
      else{
        include 'connect.php';
        // Define $username and $password
        $username = $_POST['login'];
        $password = md5($_POST['password']);
        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT login, password FROM users WHERE login=? AND password=? LIMIT 1";
        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();
        if($stmt->fetch()) { //fetching the contents of the row 
          $_SESSION['login'] = $username; // Initializing Session
        }
      mysqli_close($conn); // Closing Connection
    }
  }
}
  public function SessionVerify(){
    if(isset($_SESSION['login'])){
    header("location: includes/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck(){
    global $conn;
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['login'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT * FROM users WHERE login = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["role"] = $row["role"];
    $_SESSION["role_name"] = $row["role_name"];
  }
  public function UserType(){
    session_start();
    //if user role is 1, redirect to admin page
    if ($_SESSION["role_name"] == "admin") {
      header("Location:../user/admin/");
    }
    //if user role is 0, redirect to user page
    else if ($_SESSION["role_name"] == "assistant") {
      header("Location:../user/assistant/");
    }
    else if ($_SESSION["role_name"] == "officer") {
      header("Location:../user/officer/");
    }
    else if ($_SESSION["role_name"] == "director") {
      header("Location:../user/director/");
    }
    else if ($_SESSION["role_name"] == "owner") {
      header("Location:../user/owner/");
    }
    else {
      header("Location:../404.html");
      session_destroy();
    }
  }
}
class UserFunctions{
  public function UserName(){
    $username = $_SESSION["name"];
    return $username;
  }
  public function UserRole(){
    $userole = $_SESSION["role_name"];
    echo $userole;
  }
}
?>
