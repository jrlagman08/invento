<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

    $pass = $_POST['pword'];
	$pword = md5($pass);
	$email = strtolower($_POST['email']);
	
	$sql = "SELECT userID,email,fname,lname FROM tbl_user WHERE LOWER(email)='{$email}' AND pword='{$pword}'";
	$query = mysqli_query($connection, $sql);
	if(mysqli_num_rows($query)==1){
		$result = mysqli_fetch_assoc($query);
		$_SESSION['userID'] = $result['userID'];
		$_SESSION['email'] = $result['email'];
		$_SESSION['fname'] = $result['fname'];
		$_SESSION['lname'] = $result['lname'];

		echo "Success";
	}
	else{
		echo "Unable to login! Email or Password is incorrect.";
	}
	
	mysqli_close($connection);

?>