<?php
    session_start();
    require_once('../object/message.php');
    require_once('../object/database.php');

    //Izveido jaunu message objektu ar vērtībām, kuras ievadīja lietotājs
    $newMessage = new Message();
    $newMessage->setFullName($_POST['full-name']);
    $newMessage->setCellNr($_POST['cell-nr']);
    $newMessage->setAddress($_POST['address']);
    $newMessage->setText($_POST['message']);

    $database = new DatabaseConnection();

    //Pārbauda vai izdevās pievienot ziņu, paziņo to lietotājam caur skatu
    if($database->addMessage($newMessage)){
        $_SESSION['added'] = true;
    }else{
        $_SESSION['added'] = false;
    }

    $database->closeConnection();

    //Pārvieto lapu uz kontrolleri, lai parādītu visas ziņas
    header('location: displayMessagesController.php');
?>