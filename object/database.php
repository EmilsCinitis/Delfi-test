<?php
    class DatabaseConnection{

        public function __construct(){
            //No faila nolasa datubāzes pieslēgšanās mainīgos
            $properties = fopen("../db.properties", "r");
            $server = substr(fgets($properties), 7, -2);
            $username = substr(fgets($properties), 9, -2);
            $password = substr(fgets($properties), 9, -2);
            $dbName = substr(fgets($properties), 7);

            $this->connection = new mysqli($server, $username, $password, $dbName);

            fclose($properties);
        }

        //Pievieno jaunu ziņojumu datubāzei, ja neizdodas, atgriež false
        public function addMessage(Message $message){
            //Pirms ievieto datubāzē, tekstu sagatavo, lai varētu pievienot visus vajadzīgos simbolus, piemēram, ', kā arī, lai aizsargātu datubāzi no uzbrukumiem
            $fullName = $this->connection->real_escape_string($message->getFullName());
            $cellNr =  $this->connection->real_escape_string($message->getCellNr());
            $address = $this->connection->real_escape_string($message->getAddress());
            $text = $this->connection->real_escape_string($message->getText());

            $sql = "INSERT INTO messages (full_name, cell_nr, address, message) VALUES ('" . $fullName . "', '" . $cellNr . "', '" . $address . "', '" . $text . "')";
            if($this->connection->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        //Atgriež visus ziņojumus no datubāzes
        public function getAllMessages(){
            $sql = "SELECT * FROM messages";
            return $this->connection->query($sql);
        }

        //Aizver datubāzes savienojumu
        public function closeConnection(){
            $this->connection->close();
        }
    }
?>