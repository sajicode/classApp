<?php

	include('includes/functions.php');

	define('MAX_FILE_SIZE', '2097152');
	$ext = ['image/jpg', 'image/jpeg', 'image/png'];

	if(array_key_exists('save', $_POST)) {
		//print_r($_FILES);

		$error = [];

		if(empty($_FILES['pics']['name'])) {
			$error[] = "Please select a file";
		}

		if ($_FILES['pics']['size'] > MAX_FILE_SIZE) {
			$error[] = "File too large. Maximum: ". MAX_FILE_SIZE;
			$_FILES['pics']['tmp_name'] = null;
		}

		if(!in_array($_FILES['pics']['type'], $ext)) {
			$error[] = "File format not supported";
		}

		/*$rnd = rand(0000000000, 9999999999);
		$strip_name = str_replace(' ', '_', $_FILES['pics']['name']);

		$file_name = $rnd.$strip_name;
		$destination = './uploads/'.$file_name; */

		/* if(!move_uploaded_file($_FILES['pics']['tmp_name'], $destination)) {
			$error[] = "File not uploaded";
		} */

		if(empty($error)) {
			//move_uploaded_file($_FILES['pics']['tmp_name'], $destination);
			$msg = uploadFile($_FILES, 'pics', 'uploads/');
			//echo "File upload successful";
			if($msg[0]) {
				//echo $msg[0];
				echo "File upload successful";
			}
		} else {
			foreach ($error as $err) {
				echo $err. '</br>';
			}
		}
	}

?>

<form id="register" method="post" enctype="multipart/form-data">
	<p>Please upload a picture</p>
	<input type="file" name="pics">

	<input type="submit" name="save">
	

</form>