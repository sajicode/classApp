<?php   #Book Class

    class Book extends Product implements iDownloadable
    {
        private $_author;

        /*@override*/
        public function __construct($title, $price, $author) {
            $this->_type = "Book";
            $this->_author = $author;
            $this->_price = $price;
            $this->_title = $title;

            //call an overridden constructor ::->pammayim nekudotayim
            //parent::__construct($title, $price);
        }

        public function getAuthor() {
            return $this->_author;
        }

        public function getDescription() {
            echo '<ul>';
            
            echo '<li> type: '.$this->getType().'<li>';
            echo '<li> title: '.$this->getTitle().'<li>';
            echo '<li> price: '.$this->getPrice().'<li>';
            echo '<li> author: '.$this->getAuthor().'</li>';

            echo '</ul>';
        }

        public function prepareDownloadLink() {
            echo "Go Go Go";
        }
    }


?>