<?php
    include_once('dbhClass.php');
    include_once('notificationsClass.php');
    $userIdentificationnn = $_POST["userIdentificationnn"];
    $classNotifications->getAccountStatus($userIdentificationnn); 
?>