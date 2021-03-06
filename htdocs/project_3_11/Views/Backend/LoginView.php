<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lorka Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="Assets/Backend/layout1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="Assets/Backend/layout1/css/sb-admin.css" rel="stylesheet">
 <script type="text/javascript">
      </script>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="index.php?area=Backend&controller=Login&action=doLogin">
          <div class="form-group">
            <div class="form-group">
              Email address
              <div><input type="email" name="email" required class="form-control">
              </div>
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              Password
              <div ><input type="password" name="password" required class="form-control"></div>
              
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input value="Login" type="submit" class="btn btn-primary btn-block">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
        <button class="btn btn-sm btn-secondary" style="margin-right: 1rem;">Note:</button>Chỉ có admin mới có quên truy cập
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="Assets/Backend/layout1/vendor/jquery/jquery.min.js"></script>
  <script src="Assets/Backend/layout1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Assets/Backend/layout1/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
