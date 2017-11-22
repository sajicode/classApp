<?php

    session_start();

    $page_title = "Delete Category";

    include("includes/db.php");
    include("includes/functions.php");
    include("includes/dashboard_header.php");


    checkLogin();

    if($_GET['book_id']) {
        $book_id = $_GET['book_id'];
    }


    deleteProduct($conn, $book_id);

    redirect("view_products.php");
?>