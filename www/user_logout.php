<?php

    session_start();

    include 'includes/db.php';

	include 'includes/user_functions.php';

	include 'includes/user_header.php';

    unset($_SESSION['user']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);

    redirect("user_login.php");

?>