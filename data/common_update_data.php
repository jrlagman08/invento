<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$inputName = $_POST['updateinputName'];
	$tblName = $_POST['updatetblName'];
	$fieldID = $_POST['updatefieldID'];
	$fieldName = $_POST['updatefieldName'];
	$notifName = $_POST['updatenotifName'];
	$updateID = $_POST['updateID'];
	
	$sql = "SELECT count({$fieldName}) as c FROM {$tblName} WHERE LOWER({$fieldName})=LOWER('{$inputName}') AND {$fieldID} <> {$updateID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to update! The ".$notifName." already existing.";
	   
	} else {
		
		$sql="UPDATE {$tblName} SET {$fieldName}='{$inputName}' WHERE {$fieldID}='{$updateID}'";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to update ".$notifName."! Please try it again.";
		}
	}

	mysqli_close($connection);

?>