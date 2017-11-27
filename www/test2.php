<?php

    include("product.php");

    //create a new instance/copy
    $product = new Product();

    //$product->title = "shrek";   //testing class modification

    $productTitle = $product->getTitle();

    echo $productTitle;

?>