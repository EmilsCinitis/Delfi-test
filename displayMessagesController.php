<?php
    session_start();
    require_once('database.php');
    require_once('message.php');

    $database = new DatabaseConnection();
    $result = $database->getAllMessages();
    $messages = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $message = new Message();
            $message->setFullName($row['full_name']);
            $message->setCellNr($row['cell_nr']);
            $message->setAddress($row['address']);
            $message->setText($row['message']);

            array_push($messages, $message);
        }
    }

    $_SESSION['messages'] = $messages;
    foreach($_SESSION['messages'] as $message){
        echo $message->getText();
    }

    header('location: displayMessages.php');
?>