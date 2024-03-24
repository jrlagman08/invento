<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$updateCategory = $_POST['updateCategory'];
	$updateSubCategory = $_POST['updateSubCategory'];
	$updateID = $_POST['updateID'];
	
	$sql = "SELECT count(name) as c FROM tbl_subcategory WHERE LOWER(name)=LOWER('{$updateSubCategory}') AND categoryID={$updateCategory} AND subCategoryID <> {$updateID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to update! The Sub Category already existing.";
	   
	} else {
		
		$sql="UPDATE tbl_subcategory SET name='{$updateSubCategory}',categoryID='{$updateCategory}' WHERE subCategoryID='{$updateID}'";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to update Sub Category! Please try it again.";
		}
	}

	mysqli_close($connection);

?>