<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	
	$sql="SELECT ri.*,CONCAT(u.fname, ' ', u.lname) as uname FROM tbl_received ri INNER JOIN tbl_user u ON ri.userID=u.userID ORDER BY ri.receivedDate DESC";
	$result = mysqli_query($connection, $sql);
	confirm_query($result);
	$table = array();
	while($row=mysqli_fetch_array($result)){
		$table[] = $row;
	}

	echo json_encode($table);
	
	mysqli_close($connection);

?>