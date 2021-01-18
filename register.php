<?php include 'settings.php'; //include settings ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Musa Abbasov">
  <title>Document Tracking System - Register</title>
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/International_Islamic_University_Malaysia_logo.svg/1200px-International_Islamic_University_Malaysia_logo.svg.png" type="image/icon type">
  <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="container">
    <div class="row rwcenter">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" action="register_user.php" method="POST">
              <div class="form-label-group">
                <input name="new_name" type="" id="new_name" class="form-control" placeholder="Name" required autofocus>
                <label for="new_name">Name</label>
              </div>
              <div class="form-label-group">
                <input name="new_email" type="" id="new_email" class="form-control" placeholder="Email" required autofocus>
                <label for="new_email">Email</label>
              </div>
              <div class="form-label-group">
                <input name="new_staff_id" type="" id="new_staff_id" class="form-control" placeholder="Staff ID" required autofocus>
                <label for="new_staff_id">Staff ID</label>
              </div>
              <div class="form-label-group">
                <input name="new_password" type="password" id="new_password" class="form-control" placeholder="Password" required>
                <label for="new_password">Password</label>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="register_submit">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
