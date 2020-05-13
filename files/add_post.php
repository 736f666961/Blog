<?php
    session_start();

    // Import connection file
    require_once('connection.php');

    // Define connection 
    $connection = new Connection();
    
    // Get data from user
    $postTitle = $_POST["post-title"];
    $postBody = $_POST["post-body"];
    $postImage = $_POST["post-image"];

    // Make data safe from injection
    $safeTitle = mysqli_real_escape_string($connection->__construct(), $postTitle);
    $safeBody = mysqli_real_escape_string($connection->__construct(), $postBody);
    $safeImage = mysqli_real_escape_string($connection->__construct(), $postImage);

    // Query for insert data into table
    $sql = "INSERT INTO posts (post_id, post_title, post_body, post_image, written_by) VALUES ('" . $_SESSION['postID'] . "'," . "'" . $safeTitle . "',". "'" . $safeBody . "'," . "'" . $safeImage . "',". "'" . $_SESSION['username'] . "');";

    // execute query aka insert data
    mysqli_query($connection->__construct(), $sql) or die("Error " . mysqli_error($connection->__construct()));;

    // close connection
    $connection->__construct()->close();

    // Redirect to 
    header("Location: posts.php");
?>

