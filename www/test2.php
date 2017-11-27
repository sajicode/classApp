<?php

    include("product.php");

    //create a new instance/copy
    $product = new Product();

    $productTitle = $product->getTitle();

    echo $productTitle;

?>