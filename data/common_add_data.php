<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$inputName = $_POST['addinputName'];
	$tblName = $_POST['addtblName'];
	$fieldName = $_POST['addfieldName'];
	$notifName = $_POST['addnotifName'];
	
	$sql = "SELECT count({$fieldName}) as c FROM {$tblName} WHERE LOWER({$fieldName})=LOWER('{$inputName}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! The ".$notifName." already existing.";
	   
	} else {
		
		$sql = "INSERT INTO {$tblName} ({$fieldName}) VALUES ('{$inputName}')";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to add ".$notifName."! Please try it again.";
		}
	}

	mysqli_close($connection);

?>