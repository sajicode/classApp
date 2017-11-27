<?php   #DVD Class

    class DVD extends Product
    {
        private $_duration;
        /*@override*/
        public function __construct($title, $price, $duration) {
            $this->_type = "DVD";
            $this->_duration = $duration;
            $this->_price = $price;
            $this->_title = $title;

            //call an overridden constructor
            //parent::__construct($title, $price);
        }

        public function getDuration() {

            return $this->_duration;
        }

        public function getDescription() {
            echo '<ul>';
            
            echo '<li> type: '.$this->getType().'<li>';
            echo '<li> title: '.$this->getTitle().'<li>';
            echo '<li> price: '.$this->getPrice().'<li>';
            echo '<li> duration: '.$this->getDuration().'</li>';

            echo '</ul>';
        }
    }


?>