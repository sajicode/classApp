<?php

    define('DBNAME', 'store');
    define('DBUSER', 'root');
    define('DBPASS', 'adams');

    try{

    $db = new PDO('mysql:host=localhost;dbname'.DBNAME, DBUSER, DBPASS);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    } catch(PDOException $err) {

        echo $err->getMessage();
    }

?>