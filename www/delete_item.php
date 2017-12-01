<?php

    session_start();

	include 'includes/db.php';

    include 'includes/user_functions.php';

    if($_GET['bookId']) {
        $book_id = $_GET['bookId'];
    }

    $clean = array_map('trim', $_POST);
	$clean['book_id'] = $book_id;
    deleteBook($conn, $clean);
    
    redirect("cart.php","?Item deleted");
    
?>