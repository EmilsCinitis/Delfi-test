<?php 
    require_once('message.php');
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>EDU</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
		<link rel="stylesheet" href="messages.css" type="text/css" />
    </head>
    <body>
		<div class="container">

            <?php
                if(isset($_SESSION['added'])){   
                    if($_SESSION['added']){
                        $_SESSION['added'] = null;
            ?>
            <div class="success">
                <p>Ziņa pievienota!</p>
            </div>
            <?php
                    }else if(!$_SESSION['added']){
                        $_SESSION['added'] = null;
            ?>
            <div class="error">
                <p>Ziņu neizdevās pievienot!</p>
            </div>
            <?php
                    }
                }
            ?>
            <div class="row table-container">
                <?php 
                    if(isset($_SESSION['messages']) && count($_SESSION['messages']) != 0){
                ?>
                <table id="message-table">
                    <thead>
                        <th>Vārds, uzvārds</th>
                        <th>Telefona numurs</th>
                        <th>Adrese</th>
                        <th colspan="3">Ziņojums</th>
                    </thead>

                    <?php
                            if(isset($_SESSION['messages'])){
                                foreach($_SESSION['messages'] as $message){
                    ?>
                    <tr>
                        <td><?php echo $message->getFullName() ?></td>
                        <td><?php echo $message->getCellNr() ?></td>
                        <td><?php echo $message->getAddress() ?></td>
                        <td colspan="3"><?php echo $message->getText() ?></td>
                    </tr>
                    <?php
                                }
                            }
                    ?>
                </table>
                <?php 
                    }else{
                ?>
                    <p>Ziņu nav!</p>
                <?php
                    }
                ?>
            </div>
            <div class="row centered">
                <a class="button" href=".">Atpakaļ</a>
                <a class="button" href="displayMessagesController.php">Atjaunot</a>
            </div>
        </div>
	</body>
</html>