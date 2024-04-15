<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addsupplierName = $_POST['addsupplierName'];
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
	
	$addprodList = $_POST['addprodList'];
	$insertedID = '';
	$prodListDecoded = json_decode($addprodList, true);
	
	$sql = "SELECT count(name) as c FROM tbl_supplier WHERE LOWER(name)=LOWER('{$addsupplierName}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! Supplier Name already existing.";
	   
	} else {
		
		// Insert Supplier
		$sql = "INSERT INTO tbl_supplier (name,address,address2,city,province,country,zipcode,email,phone,mobile,econtactPerson,econtactEmail,econtactMobile) VALUES ('{$addsupplierName}','{$addAddress1}','{$addAddress2}','{$addCity}','{$addProvince}','{$addCountry}','{$addZip}','{$addEmailAddress}','{$addPhoneNumber}','{$addMobileNumber}','{$addContactPerson}','{$addContactEmailAddress}','{$addContactMobileNumber}')";
		if(mysqli_query($connection, $sql)){
			
			// Get ID of newly inserted Product
			if($insertedID == '') {
				$insertedID = mysqli_insert_id($connection);
			}
			
			// Save Supplier Product Items 
			foreach ($prodListDecoded as $item) {
				
				$prodcode = $item[0];
				$prodname = explode("|", $item[1])[0];
				$proddetails = explode("|", $item[1])[1];
				$prodorigprice = explode("|", $item[1])[2];
				
				$sql = "INSERT INTO tbl_supplieritem (supplierID, prodCode, prodName, prodDetails, origPrice) VALUES ('$insertedID', '$prodcode', '$prodname', '$proddetails', '$prodorigprice')";
				$result = mysqli_query($connection, $sql);
				
			}
			
			echo "Success";
		}
		else {
			echo "Unable to add Supplier! Please try it again.";
		}
	}

	mysqli_close($connection);

?>