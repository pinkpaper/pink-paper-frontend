<?php require_once "php/controllerUserData.php"; ?>
 <?php
if (isset($_SESSION['email'])) {
  header("Location: ./");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login | Pink Papers </title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- favicon -->
  <link rel="icon" href="assets/images/logo/favicon.ico">

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- icons pack -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />

  <!-- stylesheet -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="assets/css/loader.css" rel="stylesheet">

  <!-- Css for view password icon starts -->
  <style type="text/css">
    .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
    }
  </style>
  <!-- Css for view password icon ends -->
</head>

<body onload="loader()">

  <!-- loader start-->
  <div class="loader-container">
    <div class="loader"></div>
  </div>
  <!-- loader end-->

  <?php
  $result = mysqli_query($link, 'SELECT * FROM `logo`');
  $rowLogo = mysqli_fetch_assoc($result);
  ?>

  <div class="container">
    <div class="row justify-content-center my-5">
      <div class="col-lg-8 col-md-12">
        <div class="register-main-card shadow">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="register-left px-3 py-4">
                <div class="d-flex justify-content-between align-items-center">
                  <img src="<?php echo $rowLogo['logo_image']; ?>" width='151px' alt='logo'>
                  <a href="./"class="btn btn-home-icon"><i class="icon-home"></i></a>
                </div>
                <div class="p-5">
                  <img src="assets/images/logo/post.svg" class="img-fluid" alt="">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="register-right text-center px-4 py-4">
                <h4 class="fw-bold">Welcome Back!</h4>
                <p class="text-muted">Login with your email and password.</p>

                <form action="login-user.php" method="POST" autocomplete="">
                  <?php
                  if (count($errors) > 0) {
                  ?>
                    <div class="alert alert-danger text-center my-3">
                      <?php
                      foreach ($errors as $showerror) {
                        echo $showerror;
                      }
                      ?>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="form-group mb-3">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                  </div>
                  <div class="form-group mb-0">
                    <input id="password-field" class="form-control" type="password" name="password" placeholder="Password" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="left:-10px;"></span>
                  </div>
                  <div class="mb-3 d-flex justify-content-end"><a href="forgot-password" class="login-link">Forgot
                      password?</a></div>
                  <div class="d-grid mb-4">
                    <input class="btn button-primary" type="submit" name="login" value="Login">
                  </div>
                  <div class="text-center fw-bold">Not yet a member? <a href="register" class="login-link">Register</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <!-- script -->
  <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>
  <script type="text/javascript" src="assets/js/loader.js"></script>

  <!-- Javascript for view password starts-->
  <script type="text/javascript">
    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
  <!-- Javascript for view password ends-->
</body>

</html>