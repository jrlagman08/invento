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
  <title>Invento | Registration</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="img/InventoLogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Inven</b>to</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new user</p>

      <form id="regform">
        <div class="input-group mb-3">
          <input id="fname" type="text" class="form-control" placeholder="First name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="lname" type="text" class="form-control" placeholder="Last name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control" required placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="secpin" type="text" class="form-control" placeholder="Security Pin" minlength="4" maxlength="4" onkeypress="return onlyNumberKey(event)" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pword" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="cpword" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>-->

      <a href="login.php" class="text-center">I am already registered</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>


<!-- Firebase/Firestore SDK -->
<script type="module">

  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js";
  import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, sendEmailVerification } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-auth.js";
  import { getFirestore, addDoc, setDoc, doc, collection, serverTimestamp } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-firestore.js";
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
  const user = auth.currentUser;
  const db = getFirestore();
  var test = "dontredirect";

  //--- Registration ---//
  const regForm = document.querySelector('#regform');
  regForm.addEventListener('submit', (e) => {
    e.preventDefault();

    // get user info
    const fname = regForm['fname'].value;
    const lname = regForm['lname'].value;
    const secpin = regForm['secpin'].value;
    const email = regForm['email'].value;
    const pword = regForm['pword'].value;
    const cpword = regForm['cpword'].value;

    // email validation
    validateEmail();

    // password matching validation
    validatePassword(pword,cpword);

    // add user in firebase DB
    createUserWithEmailAndPassword(auth, email, pword).then((userCredential) => {
      // Signed in 
      const userID = userCredential.user.uid;
      //console.log(userID);

      // add other user info in firebase DB
      setDoc(doc(db, "users", userID), {
        fname: fname,
        lname: lname,
        pin: secpin,
        is_active: true,
        created_by: "",
        edited_by: "",
        dt_created: serverTimestamp(),
        dt_edited: serverTimestamp()
      });

      // Auto Login
      // check user from firebase DB
      signInWithEmailAndPassword(auth, email, pword).then((userCredential) => {

        // Send email notification for registration
        sendEmailVerification(auth.currentUser)
        .then(() => {
          // Email verification sent!
          // ...
        });

        // Logged in 
        //const user = userCredential.user;
        regForm.reset();
        loginSuccessRedirect();
      }).catch((error) => {
        // An error ocurred
        alert("Registration failed. Please try again!");
      });
    }).catch((error) => {
      const errorCode = error.code;
      if(errorCode == "auth/email-already-in-use"){
        alert("Email is already registered. Please try again!");
      }
    });

  });
  //--- Registration ---//

  //--- Check session if user is logged-in ---//
  window.onload = function() {
    let invento_user = sessionStorage.getItem("invento_user");
    if(invento_user){
      location.href = "../index.php";
    }
  };

 
</script>



<!-- Custom Functions by Errol -->
<script src="js/functions.js"></script>

</body>
</html>
