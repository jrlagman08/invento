<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$addCustomer = $_POST['addCustomer'];
	$addOR = $_POST['addOR'];
	$date=date_create($_POST['addOrderDateInput']);
	$addOrderDateInput = date_format($date,"Y-m-d H:i");
	$addGrandTotal = $_POST['addGrandTotal'];
	$addPayment = $_POST['addPayment'];
	$addPaymentRef = $_POST['addPaymentRef'];
	$addAmountPaid = $_POST['addAmountPaid'];
	$addBalance = $_POST['addBalance'];
	$addCashier = $_POST['addCashier'];
	
	$sql = "SELECT count(orderID) as c FROM tbl_order WHERE LOWER(orderNum)=LOWER('{$addOR}')";
	$result = mysqli_query($connection, $sql) ;
	$data=mysqli_fetch_assoc($result);
	confirm_query($result);     
	
	if($data['c']>=1){
		
	   echo "Unable to add! Order Number already existing.";
	   
	} else {
		
		$sql = "INSERT INTO tbl_order (orderDate,
		orderNum,
		customerID,
		userID,
		paymentID,
		paymentref,
		amountPaid,
		grandTotal,
		balance) VALUES ('{$addOrderDateInput}',
		'{$addOR}',
		'{$addCustomer}',
		'{$addCashier}',
		'{$addPayment}',
		'{$addPaymentRef}',
		'{$addAmountPaid}',
		'{$addGrandTotal}',
		'{$addBalance}')";
		if(mysqli_query($connection, $sql)){
			echo "Success";
		}
		else {
			echo "Unable to add Order! Please try it again.";
		}
	}

	mysqli_close($connection);

?>