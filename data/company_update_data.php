<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');
	
	$updatecomName = $_POST['updatecomName'];
	$updatecomAddress1 = $_POST['updatecomAddress1'];
	$updatecomAddress2 = $_POST['updatecomAddress2'];
	$updatecomCity = $_POST['updatecomCity'];
	$updatecomProvince = $_POST['updatecomProvince'];
	$updatecomCountry = $_POST['updatecomCountry'];
	$updatecomZip = $_POST['updatecomZip'];
	$updatecomEmail = $_POST['updatecomEmail'];
	$updatecomPhone = $_POST['updatecomPhone'];
	$updatecomMobile = $_POST['updatecomMobile'];
	$updatecomWebsite = $_POST['updatecomWebsite'];
	
	$sql="UPDATE tbl_companyinfo SET 
			name='{$updatecomName}',
			address='{$updatecomAddress1}',
			address2='{$updatecomAddress2}',
			city='{$updatecomCity}',
			province='{$updatecomProvince}',
			country='{$updatecomCountry}',
			zipcode='{$updatecomZip}',
			email='{$updatecomEmail}',
			phone='{$updatecomPhone}',
			mobile='{$updatecomMobile}',
			website='{$updatecomWebsite}'
			WHERE companyinfoID = 1";
			
	if(mysqli_query($connection, $sql)){
		echo "Success";
	}
	else {
		echo "Unable to update Company Info! Please try it again.";
	}

	mysqli_close($connection);

?>