<?php   #product class

    abstract class Product 
    {
        protected $_title;
        protected $_price;
        protected $_type;

        //public function __construct(/*$type, */$title, $price) {    //constructor, called only once

            //$this->_title = $title;
            //$this->_price = $price;
            //$this->_type = $type;
        //}

        //an object is an instance of a class

        function getTitle() {

            return $this->_title;
        }

        function setTitle($title) {   //interface for modifying class data

            $this->_title = $title;
        }

        function getPrice() {

            return $this->_price;
        }

        function setPrice($price) {

            $this->_price = $price;
        }

        function getType() {

            return $this->_type;
        }

        function setType($type) {     //improper bcos type should be pre-set

            $this->_type = $type;
        }

        //program to an interface not an implementation
        abstract public function getDescription();   #defining an abstract interface
    }



?>