<?php include 'settings.php'; //include settings

  $query = "SELECT * FROM users WHERE role_name IS NULL"; 
  $result = mysqli_query($conn, $query); 

  if ($result) 
  { 
      // it return number of rows in the table. 
      $row = mysqli_num_rows($result); 
        
        if ($row) 
        { 
           printf("Number of users with no role : " . $row); 
           $_SESSION['current_count'] = $row;
        } 
        else{
          echo "All users have role";
        }
      // close the result. 
      mysqli_free_result($result); 
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
  </head>
  <body>
    <h1>Admin page</h1>
    <h2>Hello: <?php $ufunc->UserName(); //Show name who is in session user?></h2>
    <h2>Role: <?php echo $_SESSION['role_name']; //Show name who is in session user?></h2>
    <?php
      //$_SESSION['increment'] = NULL;
      if ($_SESSION['increment']){
        echo "You got noti";
      }
      else{
        echo "You got no noti";
      }
      $_SESSION['increment'] = FALSE;

    ?>

    <form class="form-signin" action="update_user_role.php" method="POST">
      <label for="input_user">Update user role</label>
      <input type="" name="input_user" placeholder="Enter user name here">
      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="admin_submit">Update User Role</button>
    </form>

    <a href="../../includes/logout.php">Logout</a>
  </body>
</html>
