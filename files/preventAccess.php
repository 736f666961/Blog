<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: 403.php');
    exit;
}
?>