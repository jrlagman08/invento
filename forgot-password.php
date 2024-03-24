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
  <title>Invento | Forgot Password</title>

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
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form id="resetPasswordForm">
        <div class="input-group mb-3">
          <input type="email" id="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new user</a>
      </p>
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



<!-- Firebase/Firestore SDK -->
<script type="module">

  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js";
  import { getAuth, sendPasswordResetEmail, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-auth.js";
  import { getFirestore } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-firestore.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyD4DLuAZGOH24FDbAY7rIUSONTk2FW2oFU",
    authDomain: "invento-db.firebaseapp.com",
    projectId: "invento-db",
    storageBucket: "invento-db.appspot.com",
    messagingSenderId: "53203100401",
    appId: "1:53203100401:web:e142cc90304daefc647f50"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const auth = getAuth();
  const db = getFirestore();

   //--- Get user info ---//
   onAuthStateChanged(auth, (user) => {
    if (user) {
         // User is signed in - redirect to dashboard page
         location.href = "../index.php";
      } else {
        // User is signed out
      }
  });

  //--- Reset Password ---//
  const resetForm = document.querySelector('#resetPasswordForm');
  resetForm.addEventListener('submit', (e) => {
    e.preventDefault();

    // get user email
    const emailAdd = resetForm['email'].value;

    validateEmail();

    // Password reset email sent!
    sendPasswordResetEmail(auth, emailAdd).then(() => {
      resetForm.reset();
      resetSuccessRedirect();
    }).catch((error) => {
      // An error ocurred
      warningNotif("Email is not registered!");
    });

  });
  //--- Reset Password ---//

  
</script>

<!-- Custom Functions by Errol -->
<script src="js/functions.js"></script>


</body>
</html>
