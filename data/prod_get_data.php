<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

    $itemID = $_POST['itemID'];
	
	$sql="SELECT prod.*,cat.name as cat,subcat.name as subcat,class.name as clas,clr.name as clr,ssn.name as ssn,uom.name as uom,wrh.name as wrh,rak.name as rak 
			FROM tbl_product prod 
			INNER JOIN tbl_category cat ON prod.categoryID=cat.categoryID 
			INNER JOIN tbl_subcategory subcat ON prod.subCategoryID=subcat.subCategoryID 
			INNER JOIN tbl_classification class ON prod.classificationID=class.classificationID 
			INNER JOIN tbl_color clr ON prod.colorID=clr.colorID 
			INNER JOIN tbl_season ssn ON prod.seasonID=ssn.seasonID 
			INNER JOIN tbl_uom uom ON prod.uomID=uom.uomID 
			INNER JOIN tbl_warehouse wrh ON prod.warehouseID=wrh.warehouseID 
			INNER JOIN tbl_rack rak ON prod.rackID=rak.rackID 
			WHERE prod.prodID='{$itemID}'
			ORDER BY prod.prodName DESC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$data = array();
	while($row=mysqli_fetch_array($result)){
		$data[] = $row;
	}

	echo json_encode($data);
	
	mysqli_close($connection);

?>