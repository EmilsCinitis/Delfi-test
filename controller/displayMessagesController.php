<?php
    session_start();
    require_once('../object/database.php');
    require_once('../object/message.php');


    $database = new DatabaseConnection();
    //Iegūst visas ziņas
    $result = $database->getAllMessages();
    $messages = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //Izveido jaunu message objektu no datubāzē saglabātās informācijas
            $message = new Message();
            //Html entities neļauj lietotājiem pievienot skriptus caur tekstu
            $message->setFullName(htmlentities($row['full_name']));
            $message->setCellNr(htmlentities($row['cell_nr']));
            $message->setAddress(htmlentities($row['address']));
            $message->setText(htmlentities($row['message']));

            array_push($messages, $message);
        }
    }

    $database->closeConnection();

    //Skatam padod visas ziņas
    $_SESSION['messages'] = $messages;

    //Pāradresē uz skatu
    header('location: ../view/displayMessages.php');
?>