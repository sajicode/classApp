<?php   #product class

    class Product 
    {
        private $title = "Iorigin";
        private $price;
        private $type;

        //an object is an instance of a class

        function getTitle() {

            return $this->title;
        }

        function setTitle($title) {   //interface for modifying class data

            $this->title = $title;
        }
    }



?>