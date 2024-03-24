<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addCategory = $_POST['addCategory'];
	$addSubCategory = $_POST['addSubCategory'];
	
	$sql = "SELECT count(name) as c FROM tbl_subcategory WHERE LOWER(name)=LOWER('{$addSubCategory}') AND categoryID={$addCategory}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! The Sub Category already existing.";
	   
	} else {
		
		$sql = "INSERT INTO tbl_subcategory (categoryID,name) VALUES ('{$addCategory}','{$addSubCategory}')";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to add Sub Category! Please try it again.";
		}
	}

	mysqli_close($connection);

?>