<?php
     include_once('classes/dbhClass.php'); 
     include_once('classes/signinClass.php');
     $userdetails = $classSignIn->getUserDetails();
     include_once('classes/signoutClass.php');
     $classSignOut->signOut();
     header ("location: index.php?route=home");
?>