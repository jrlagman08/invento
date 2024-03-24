<?php
	//Session settings
	ob_start();
	session_start();
	$session=session_id();
	$time=time();
	$time_check=$time-600; 
	
	//Login Validation
	function logged_in() {
		return isset($_SESSION['userID']);
	}

	//Confirm if user needs to login
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

	//Confirm if user is already logged in
	function confirm_log_in(){
		if(logged_in()){
			redirect_to("index.php");
		}
	}
?>