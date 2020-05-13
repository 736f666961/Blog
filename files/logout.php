<?php 
    session_start();
    session_destroy();
    session_unset();
    unset($_SESSION['username']);
    unset($_SESSION['postID']);
    
    header("location: ../index.html");
?>