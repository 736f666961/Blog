<?php
    session_start();

    // Import Coonection file
    require_once('connection.php');

    // Get data from user
    $postTitle = $_POST["post-title"];
    $postBody = $_POST["post-body"];
    $postImage = $_POST["post-image"];
    $id = $_GET['EditPid'];

    // Check user data
    if ($postTitle != "" && $postBody != "" && $postImage != ""){
        // Define Connection
        $connection = new Connection();
        
        // Make data safe from injection
        $safeTitle = strval($postTitle); //mysqli_real_escape_string($connection->__construct(), $postTitle);
        $safeBody = strval($postBody); //mysqli_real_escape_string($connection->__construct(), $postBody);
        $safeImage = strval($postImage); //mysqli_real_escape_string($connection->__construct(), $postImage);

        // echo 'Email Address seems new !';
        $sql = "UPDATE posts SET post_title='" . $safeTitle . "', post_body='" . $safeBody . "', post_image='" . $safeImage . "' WHERE id='" . $id . "';";

        // Check connection
        if (!$connection->__construct()) {
            die("Connection failed: " . $connection->__construct());
        }

        // execute query aka insert data
        mysqli_query($connection->__construct(), $sql) or die("Error: " .$connection->__construct());

        // close connection
        $connection->__construct()->close();

        // Redirect to posts page
        header("Location: posts.php");
        
    }else{
        echo "Data does not updated !";
    }
?>