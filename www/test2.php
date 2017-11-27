<?php

    include("downloadable.php");
    include("product.php");
    include("dvd.php");
    include("book.php");

    //create a new instance/copy
    //$product = new Product("Book", "Measuring Time", 75);
    //$product2 = new Product("DVD", "Iorigins", 100);

    //$product->title = "shrek";   //testing class modification bad method

    //$product->setTitle("shrek");    //right method

    //$productTitle = $product->getTitle();

    //echo $productTitle;

    echo "<hr/>";

    //$product2->setTitle("need for speed");
    //$productTitle2 = $product2->getTitle();

    //echo $productTitle2;

    echo "<hr/>";

    $book = new Book("Waiting for an Angel", 500, "Helon Habila");
    $bookTitle = $book->getTitle();
    echo $bookTitle;

    echo "<hr/>";

    $bookType = $book->getType();
    echo $bookType;

    echo "<hr/>";

    $bookAuthor = $book->getAuthor();
    echo $bookAuthor;

    echo "<hr>";

    $book->getDescription();

    echo "<hr>";

    //$dvd->getDescription();

    $book->prepareDownloadLink();
?>