<?php
	//Declaration of all includes including header
	require_once('../includes/session.php');
	require_once('../includes/connection.php');
	require_once('../includes/functions.php');

	$prodID = $_POST['prodID'];
	
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
	$path = '../img/gallery/'; // upload directory
	if($_FILES['file']) {
		$img = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000,1000000).$img;
		// check's valid format
		if(in_array($ext, $valid_extensions)) { 
			$path = $path.strtolower($final_image); 
			$savedpath = 'img/gallery/'.strtolower($final_image); 
			if(move_uploaded_file($tmp,$path)) 
			{
				$sql = "INSERT INTO tbl_image (prodID,path) VALUES ('{$prodID}','{$savedpath}')";
				if(mysqli_query($connection, $sql)){
					echo "success";
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