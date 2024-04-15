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
	
	$addprodList = $_POST['addprodList'];
	$insertedID = '';
	$prodListDecoded = json_decode($addprodList, true);
	
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
			
			// Get ID of newly inserted Product
			if($insertedID == '') {
				$insertedID = mysqli_insert_id($connection);
			}
			
			// Save Product Items 
			foreach ($prodListDecoded as $item) {
				
				$prodID = $item[0];
				$OrigPrice = explode("|", $item[1])[0];
				$Qty = explode("|", $item[1])[1];
				$SalePrice = explode("|", $item[1])[2];
				$Discount = explode("|", $item[1])[3];
				$DiscountedPrice = explode("|", $item[1])[4];
				
				$sql = "INSERT INTO tbl_orderitem (orderID, prodID, origPrice, salePrice, discountedPrice, discountAmount, qty) VALUES ('$insertedID', '$prodID', '$OrigPrice', '$SalePrice', '$DiscountedPrice', '$Discount', '$Qty')";
				$result = mysqli_query($connection, $sql);
				
				// Update Running balance of the Single Product
				$sql = "UPDATE tbl_product SET runningBal = runningBal - {$Qty} WHERE prodID={$prodID}";
				$result = mysqli_query($connection, $sql);
				
			}
			
			echo "Success";
		}
		else {
			echo "Unable to add Order! Please try it again.";
		}
	}

	mysqli_close($connection);

?>