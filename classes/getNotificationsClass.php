<?php
    include_once('dbhClass.php');
    include_once('notificationsClass.php');
    $userIdentification = $_POST["userIdentification"];
    $classNotifications->getNotificationsByUserId($userIdentification); 
?>