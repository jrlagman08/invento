<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addDepartment = $_POST['addDepartment'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pword = $_POST['pword'];
	$pass = md5($pword);
	
	$sql = "SELECT count(email) as c FROM tbl_user WHERE LOWER(email)=LOWER('{$email}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! User Email already existing.";
	   
	} else {
		
		$sql = "INSERT INTO tbl_user (email,pword,fname,lname,departmentID) VALUES ('{$email}','{$pass}','{$fname}','{$lname}','{$addDepartment}')";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to add User! Please try it again.";
		}
	}

	mysqli_close($connection);

?>