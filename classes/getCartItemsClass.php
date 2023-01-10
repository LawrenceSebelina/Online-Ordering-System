<?php
    include_once('dbhClass.php');
    include_once('notificationsClass.php');
    $userIdentificationn = $_POST["userIdentificationn"];
    $classNotifications->getCart($userIdentificationn);
?>