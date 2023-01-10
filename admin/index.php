<?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>

<!-- include_once $route.'.php'  -->

<?php 
    if (!file_exists($route.'.php' )) {
        include_once '../404.php';
    } 
    
    // elseif (!isset($_GET['route'])) {
    //     include_once '../404.php';
    // } 
    
    else {
        include_once $route.'.php';
    }
?>
