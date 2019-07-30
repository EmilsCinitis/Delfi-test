<?php
    session_start();
    require_once('message.php');
    require_once('database.php');

    $newMessage = new Message();
    $newMessage->setFullName($_POST['full-name']);
    $newMessage->setCellNr($_POST['cell-nr']);
    $newMessage->setAddress($_POST['address']);
    $newMessage->setText($_POST['message']);

    $database = new DatabaseConnection();

    if($database->addMessage($newMessage)){
        $_SESSION['added'] = true;
    }else{
        $_SESSION['added'] = false;
    }

    $database->closeConnection();

    header('location: displayMessagesController.php');
?>