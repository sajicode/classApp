<?php

    $page_title = "Register";

    include("includes/header.php");

    include("includes/db.php");
    
    include("includes/functions.php");

    $errors = array();

    if(array_key_exists('register', $_POST)) {

        if(empty($_POST['fname'])) {
            $errors['fname'] = "Please enter your firstname";
        }
        
        if(empty($_POST['lname'])) {
            $errors['lname'] = "Please enter your lastname";
        }

        if(empty($_POST['email'])) {
            $errors['email'] = "Please enter your email";
        }

        if(doesEmailExist($conn, $_POST['email'])) {
            $errors['email'] = "Email already exists";
        }

        if(empty($_POST['password'])) {
            $errors['password'] = "Please enter your password";
        }

        if(empty($_POST['pword'])) {
            $errors['pword'] = "Please confirm your password";
        }

        if($_POST['password'] != $_POST['pword']) {
            $errors['pword'] = "Please enter the correct password";
        }

        if(empty($errors)) {
            
            $clean = array_map('trim', $_POST);

            doAdminRegister($conn, $clean);

            echo "Registration successful";
        }
    }
?>

<div class="wrapper">
		<h1 id="register-label">Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
                <?php 
                    $data = displayErrors($errors, 'fname');
                    echo $data;
                ?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
                <?php 
                    $lname = displayErrors($errors, 'lname');
                    echo $lname;
                ?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
                <?php  
                    $mail= displayErrors($errors, 'email');
                    echo $mail;
                ?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
                <?php  
                    $password = displayErrors($errors, 'password');
                    echo $password;
                ?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
                <?php  
                    $pword = displayErrors($errors, 'pword');
                    echo $pword;
                ?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
    </div>
    
<?php

    include("includes/footer.php");

?>