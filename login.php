<?php 
	//Declaration of all includes including header
	require_once('includes/session.php');
	require_once('includes/connection.php');
	require_once('includes/functions.php'); 
	//Check user if not login
	confirm_log_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invento | Login</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="img/InventoLogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Inven</b>to</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="loginForm" action="data/login_data.php" method="post">
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control" required placeholder="Email" maxlength="32" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pword" name="pword" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Password" maxlength="32" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!--<div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" checked>
              <label for="remember">
                Remember Me
              </label>
            </div>-->
			<p class="mb-1">
				<a href="forgot-password.php">I forgot my password</a>
			</p>
			 <p class="mb-0">
				<a href="register.php" class="text-center">Register a new user</a>
			 </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>


<!-- Custom Functions by Errol -->
<script src="js/functions.js"></script>


<!-- Custom script -->
<script>

	//--- Login ---//	
	$("#loginForm").submit(function(){
		
		validateEmail();
		
		$.post( $("#loginForm").attr("action"), $("#loginForm :input").serializeArray(), function(info){
			if (info == 'Success'){
				window.location = "index.php";
			}
			else{
				errorNotifNoload(info);
			}
		});
		
		return false;
	});
  //--- Login ---//


</script>


</body>
</html>
