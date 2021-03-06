<?php

	session_start();

	$id = "login";

	$page_title = "Login";

	include 'includes/db.php';

	include 'includes/user_functions.php';

	include 'includes/user_header.php';

	$errors = array();

	if(array_key_exists('submit', $_POST)) {

		if(empty($_POST['email'])) {

			$errors['email'] = "<p class=\"form-error\">invalid email</p>";

		}
		if(empty($_POST['password'])) {

			$errors['password'] = "<p class=\"form-error\">wrong password</p>";

		}
			
		if(empty($errors)) {

			$clean = array_map('trim', $_POST);

			$data = userLogin($conn, $clean);

			if($data[0]) {

			$details = $data[1];

			$_SESSION['userid'] = $details['customer_id'];
			$_SESSION['fname'] = $details['firstName'];
			$_SESSION['lname'] = $details['lastName'];

			redirect("home.php", "?Login Successful");

			} else {

				redirect("user_login.php", "Invalid Email and/or Password");

			}

		}

	}
		
?>
	
<div class="main">

	<div class="login-form">

	<form action ="" method ="POST" class="def-modal-form">

		<div class="cancel-icon close-form"></div>

		<label for="login-form" class="header"><h3>Login</h3></label>

		<input type="text" class="text-field email" name="email" placeholder="Email">
		<?php $data = displayErrors($errors, 'email'); echo $data ?>

		<input type="password" class="text-field password" name="password" placeholder="Password">
		<?php $data = displayErrors($errors, 'password'); echo $data ?>

		<input type="submit" class="def-button login" name="submit" value="Login">

	</form>

	</div>

</div>

<?php include 'includes/user_footer.php'; ?>



	
