<?php

    session_start();

    include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");

    unset($_SESSION['aid']);
    unset($_SESSION['name']);

    redirect("login.php");

?>