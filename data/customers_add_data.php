<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addcustomerName = $_POST['addcustomerName'];
	$addAddress1 = $_POST['addAddress1'];
	$addAddress2 = $_POST['addAddress2'];
	$addCity = $_POST['addCity'];
	$addProvince = $_POST['addProvince'];
	$addCountry = $_POST['addCountry'];
	$addZip = $_POST['addZip'];
	$addEmailAddress = $_POST['addEmailAddress'];
	$addPhoneNumber = $_POST['addPhoneNumber'];
	$addMobileNumber = $_POST['addMobileNumber'];
	$addContactPerson = $_POST['addContactPerson'];
	$addContactEmailAddress = $_POST['addContactEmailAddress'];
	$addContactMobileNumber = $_POST['addContactMobileNumber'];
	
	$sql = "SELECT count(name) as c FROM tbl_customer WHERE LOWER(name)=LOWER('{$addcustomerName}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! Customer Name already existing.";
	   
	} else {
		
		$sql = "INSERT INTO tbl_customer (name,address,address2,city,province,country,zipcode,email,phone,mobile,econtactPerson,econtactEmail,econtactMobile) VALUES ('{$addcustomerName}','{$addAddress1}','{$addAddress2}','{$addCity}','{$addProvince}','{$addCountry}','{$addZip}','{$addEmailAddress}','{$addPhoneNumber}','{$addMobileNumber}','{$addContactPerson}','{$addContactEmailAddress}','{$addContactMobileNumber}')";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to add Customer! Please try it again.";
		}
	}

	mysqli_close($connection);

?>