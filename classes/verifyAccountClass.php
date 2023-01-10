<?php
    include_once('dbhClass.php');
    include_once('notificationsClass.php');
    $userUniqueId = $_POST["userUniqueId"];
    $classNotifications->verifyAccount($userUniqueId); 
?>