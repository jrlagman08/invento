<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$tblName = $_POST['tblName'];
	$sortName = $_POST['sortName'];
	
	$sql = "";
	
	if(isset($_POST["isRepackage"]) == 1) {
		$sql="SELECT * FROM {$tblName} WHERE runningBal <> 0 AND isRepackage = 0 ORDER BY {$sortName} ASC";
	} elseif(isset($_POST["availBal"]) == 1) {
		$sql="SELECT * FROM {$tblName} WHERE runningBal <> 0 ORDER BY {$sortName} ASC";
	} else {
		$sql="SELECT * FROM {$tblName} ORDER BY {$sortName} ASC";
	}
	
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>