<?php
    include_once('dbhClass.php');
    include_once('signinClass.php');
    $userdetails = $classSignIn->getUserDetails();
    
    if (!empty($userdetails)) {
        $userId = $userdetails['userId'];

        include_once('inventoryClass.php');
        $newCartTotal = $_POST["newCartTotal"];
        $newCartQty = $_POST["saveNewProductQty"];
        $cartId = $_POST["cartId"];
        $selectCartId = $_POST["selectCartId"];

        $classInventory->changeCartQty($newCartQty, $cartId, $userId, $newCartTotal);
        $classInventory->deleteSelectedCart($selectCartId, $userId);
    }
?>