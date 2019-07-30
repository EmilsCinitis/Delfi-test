<?php
    class DatabaseConnection{

        public function __construct(){
            $properties = fopen("db.properties", "r");
            $server = substr(fgets($properties), 7, -2);
            $username = substr(fgets($properties), 9, -2);
            $password = substr(fgets($properties), 9, -2);
            $dbName = substr(fgets($properties), 7);
            echo $server . " " . $username . " " . $password . " " . $dbName;
            $this->connection = new mysqli($server, $username, $password, $dbName);

            fclose($properties);
        }

        public function addMessage(Message $message){
            $sql = "INSERT INTO messages (full_name, cell_nr, address, message) VALUES ('" . $message->getFullName() . "', '" . $message->getCellNr() . "', '" . $message->getAddress() . "', '" . $message->getText() . "')";
            if($this->connection->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function getAllMessages(){
            $sql = "SELECT * FROM messages";
            return $this->connection->query($sql);
        }

        public function closeConnection(){
            $this->connection->close();
        }
    }
?>