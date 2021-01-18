<?php include 'settings.php'; //include settings ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Musa Abbasov">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/International_Islamic_University_Malaysia_logo.svg/1200px-International_Islamic_University_Malaysia_logo.svg.png" type="image/icon type">
  <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
</head>

<style type="text/css">
  body {
    background: #50C8B5;
    height: 100vh;
  }
  p{
    font-family: "Anton", sans-serif;
    font-size: 50px;
    text-align: center;
  }
</style>

<body>
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
          <img style="display: block; margin: auto; background-color: transparent; border: 0; max-width: 150px; padding-top: 100px" src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/International_Islamic_University_Malaysia_logo.svg/1200px-International_Islamic_University_Malaysia_logo.svg.png">  
      </div>
    </div>
<br>
    <div>
      <div>
        <p>DOCUMENT TRACKING SYSTEM</p>
      </div>
    </div>



    <!--<div class="row">
      <div class="col"></div>
      <div class="col"><p style="display: block; margin: auto; text-align: center;">Document Tracking System</p></div>
      <div class="col"></div>
    </div>-->

    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="includes/login.php" method="POST">
              <div class="form-label-group">
                <input name="login" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase uia" type="submit" name="submit">Sign in</button>
            </form>
            <a href="register.php">Dont have an account? Register here</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
