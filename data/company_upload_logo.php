<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');
	
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
	$path = '../img/companylogo/'; // upload directory
	if($_FILES['file']) {
		$img = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000,1000000).".".$ext;
		// check's valid format
		if(in_array($ext, $valid_extensions)) { 
			$path = $path.strtolower($final_image); 
			$savedpath = 'img/companylogo/'.strtolower($final_image); 
			array_map('unlink', array_filter((array) array_merge(glob("../img/companylogo/*"))));
			if(move_uploaded_file($tmp,$path)) 
			{
				$sql="UPDATE tbl_companyinfo SET 
				logo='{$savedpath}'
				WHERE companyinfoID = 1";
				if(mysqli_query($connection, $sql)){
					$data = array();
					$data[] = $savedpath;
					echo json_encode($data);
				}
				else {
					die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
				}
			}
		} 
		else {
			die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
		}
	}

	mysqli_close($connection);

?>