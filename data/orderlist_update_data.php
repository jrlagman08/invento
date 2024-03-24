<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$updateCustomer = $_POST['updateCustomer'];
	$updateOR = $_POST['updateOR'];
	$date=date_create($_POST['updateOrderDateInput']);
	$updateOrderDateInput = date_format($date,"Y-m-d H:i");
	$updateGrandTotal = $_POST['updateGrandTotal'];
	$updatePayment = $_POST['updatePayment'];
	$updatePaymentRef = $_POST['updatePaymentRef'];
	$updateAmountPaid = $_POST['updateAmountPaid'];
	$updateBalance = $_POST['updateBalance'];
	$updateCashier = $_POST['updateCashier'];
	$updateID = $_POST['updateID'];
	
	$sql = "SELECT count(orderID) as c FROM tbl_order WHERE LOWER(orderNum)=LOWER('{$updateOR}') AND orderID <> {$updateID}";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to update! Order Number already existing.";
	   
	} else {
		
		$sql="UPDATE tbl_order SET 
			orderDate ='{$updateOrderDateInput}',
			orderNum ='{$updateOR}',
			customerID ='{$updateCustomer}',
			userID ='{$updateCashier}',
			paymentID ='{$updatePayment}',
			paymentref ='{$updatePaymentRef}',
			amountPaid ='{$updateAmountPaid}',
			balance ='{$updateBalance}',
			grandTotal ='{$updateGrandTotal}' 
			WHERE orderID ='{$updateID}'";
		
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to update Order! Please try it again.";
		}
	}

	mysqli_close($connection);

?>