<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$updatesupplierName = $_POST['updatesupplierName'];
	$updateAddress1 = $_POST['updateAddress1'];
	$updateAddress2 = $_POST['updateAddress2'];
	$updateCity = $_POST['updateCity'];
	$updateProvince = $_POST['updateProvince'];
	$updateCountry = $_POST['updateCountry'];
	$updateZip = $_POST['updateZip'];
	$updateEmailAddress = $_POST['updateEmailAddress'];
	$updatePhoneNumber = $_POST['updatePhoneNumber'];
	$updateMobileNumber = $_POST['updateMobileNumber'];
	$updateContactPerson = $_POST['updateContactPerson'];
	$updateContactEmailAddress = $_POST['updateContactEmailAddress'];
	$updateContactMobileNumber = $_POST['updateContactMobileNumber'];
	$updateID = $_POST['updateID'];
	
	$sql = "SELECT count(name) as c FROM tbl_supplier WHERE LOWER(name)=LOWER('{$updatesupplierName}') AND supplierID <> {$updateID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to update! Supplier Name already existing.";
	   
	} else {
		
		$sql="UPDATE tbl_supplier SET 
			name ='{$updatesupplierName}',
			email ='{$updateEmailAddress}',
			mobile ='{$updateMobileNumber}',
			phone ='{$updatePhoneNumber}',
			address ='{$updateAddress1}',
			address2 ='{$updateAddress2}',
			city ='{$updateCity}',
			province ='{$updateProvince}',
			zipcode ='{$updateZip}',
			country ='{$updateCountry}',
			econtactPerson ='{$updateContactPerson}',
			econtactEmail ='{$updateContactEmailAddress}',
			econtactMobile ='{$updateContactMobileNumber}'
			WHERE supplierID ='{$updateID}'";
		
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to update Supplier! Please try it again.";
		}
	}

	mysqli_close($connection);

?>