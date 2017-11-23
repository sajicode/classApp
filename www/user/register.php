<?php

    $id = "registration";

    $pagetitle = "User Registration";

    include("includes/db.php");

    include("includes/functions.php");

    include("includes/header.php");

    $errors = [];

?>

<div class="main">
    <div class="registration-form">
      <form class="def-modal-form">
        <div class="cancel-icon close-form"></div>
        <label for="registration-from" class="header"><h3>User Registration</h3></label>
        
        <div>
            <?php
                $info = displayErrors($errors, 'fname');
                echo $info;
            ?>
            <input type="text" name="fname" class="text-field first-name" placeholder="Firstname">
        </div>
        <div>
            <?php
                $info = displayErrors($errors, 'lname');
                echo $info;
            ?>
            <input type="text" name="lname" class="text-field last-name" placeholder="Lastname">
        </div>
        <div>
            <?php
                $info = displayErrors($errors, 'email');
                echo $info;
            ?>
            <input type="email" name="email" class="text-field email" placeholder="Email">
        </div>
        <div>
            <?php
                $info = displayErrors($errors, 'uname');
                echo $info;
            ?>
            <input type="text" name="uname" class="text-field username" placeholder="Username">
        </div>
        <div>
            <?php
                $info = displayErrors($errors, 'password');
                echo $info;
            ?>
            <input type="password" name="password" class="text-field password" placeholder="Password">
        </div>
        <div>
            <?php
                $info = displayErrors($errors, 'pword');
                echo $info;
            ?>
            <input type="password" name="pword" class="text-field confirm-password" placeholder="Confirm Password">
        </div>
        <div>
            <input type="submit" name="register" class="def-button" value="Register">
        </div>
        <p class="login-option">Have an account already? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>

<?php include("includes/footer.php"); ?>