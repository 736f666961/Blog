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
        $safeName = mysqli_real_escape_string($connection->__construct(), $postTitle);
        $safeEmail = mysqli_real_escape_string($connection->__construct(), $postBody);
        $safePassword = mysqli_real_escape_string($connection->__construct(), $postImage);

        // echo 'Email Address seems new !';
        $sql = "UPDATE posts SET post_title='" . $postTitle . "', post_body='" . $postBody . "', post_image='" . $postImage . "' WHERE id='" . $id . "';";

        echo $sql;

        // execute query aka insert data
        mysqli_query($connection->__construct(), $sql) or die($connection->__construct());

        // close connection
        $connection->__construct()->close();

        // Redirect to 
        header("Location: posts.php");
        
    }else{
        echo "Data does not updated !";
    }
?>