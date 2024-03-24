<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$updateDepartment = $_POST['updateDepartment'];
	$fnameupdate = $_POST['fnameupdate'];
	$lnameupdate = $_POST['lnameupdate'];
	$emailupdate = $_POST['emailupdate'];
	$pwordupdate = $_POST['pwordupdate'];
	$cpwordupdate = $_POST['cpwordupdate'];
	$pword = md5($pwordupdate);
	$updateID = $_POST['updateID'];
	
	$sql = "SELECT count(email) as c FROM tbl_user WHERE LOWER(email)=LOWER('{$emailupdate}') AND userID <> {$updateID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to update! User Email already existing.";
	   
	} else {
		
		$sql = "";
		if(!empty($pwordupdate) && !empty($cpwordupdate)){
			$sql="UPDATE tbl_user SET 
			email ='{$emailupdate}',
			fname ='{$fnameupdate}',
			lname ='{$lnameupdate}',
			departmentID ='{$updateDepartment}',
			pword ='{$pword}' 
			WHERE userID ='{$updateID}'";
		} else {
			$sql="UPDATE tbl_user SET 
			email ='{$emailupdate}',
			fname ='{$fnameupdate}',
			lname ='{$lnameupdate}',
			departmentID ='{$updateDepartment}'			
			WHERE userID ='{$updateID}'";
		}
		
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to update User! Please try it again.";
		}
	}

	mysqli_close($connection);

?>