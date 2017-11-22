<?php

	session_start();
	$page_title = "Login";
	
	include("includes/header.php");
	
	include("includes/db.php");

	include("includes/functions.php");

	$error = array();

	if(array_key_exists('register', $_POST)) {

		if(empty($_POST['email'])) {
			$error['email'] = "Please enter your email";
		}

		if(empty($_POST['password'])) {
			$error['password'] = "Please enter your password";
		} else {
			$msg = "Invalid email/password";
			header("location:login.php?msg=$msg");
		}

		if(empty($error)) {

			$clean = array_map('trim', $_POST);

			$data = adminLogin($conn, $clean);

			if($data[0]) {

				$details = $data[1];

				$_SESSION['aid'] = $details['admin_id'];
				$_SESSION['name'] = $details['firstName'].' '.$details['lastName'];

				header("location:add_category.php");
			} else {
				$message = "Invalid email/password";
				header("location.php?mess=$message");
			}

			/* if(validateLogin($conn, $_POST['email'], $_POST['password'])) {
				header("location:sandview.php");
				//echo "Hello";
			} else {
				echo "Wrong email/password";
			} */
		}
	}

?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="" method ="POST">
			<div>
				<?php  
					$mail = displayErrors($error, 'email');
					echo $mail;
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>

			<div>
				<?php
					$pass = displayErrors($error, 'password');
					echo $pass;
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="register" value="login">
		</form>

	<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
</div>

<?php

    include("includes/footer.php");

?>