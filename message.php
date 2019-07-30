<?php 
    class Message{
        private $full_name;
        private $cell_nr;
        private $address;
        private $text;

        public function setFullName($name){
            $this->full_name = $name;
        }

        public function getFullName(){
            return $this->full_name;
        }

        public function setCellNr($cellNr){
            $this->cell_nr = $cellNr;
        }

        public function getCellNr(){
            return $this->cell_nr;
        }

        public function setAddress($addr){
            $this->address = $addr;
        }

        public function getAddress(){
            return $this->address;
        }

        public function setText($t){
            $this->text = $t;
        }

        public function getText(){
            return $this->text;
        }
    }
?>