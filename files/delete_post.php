<?php
    session_start();

    // Import Coonection file
    require_once('connection.php');

    $id = $_GET['deletePid'];

    // Define Connection
    $connection = new Connection();
        
    // Delete Query
    $sql = "DELETE FROM posts WHERE id='" . $id . "';";

    // echo $sql;

    // execute query aka insert data
    mysqli_query($connection->__construct(), $sql) or die($connection->__construct());

    // close connection
    $connection->__construct()->close();

    // Redirect to posts page
    header("Location: posts.php");
?>