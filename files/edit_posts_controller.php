<?php
    session_start();

    // Import Coonection file
    // require_once('connection.php');
    require_once('preventAccess.php');


    // // Get data from user
    $postTitle = $_POST["post-title"];
    $postBody = $_POST["post-body"];
    $postImage = $_POST["post-image"];
    $id = $_GET['EditPid'];

    // // Check user data
    // if ($postTitle != "" && $postBody != "" && $postImage != ""){
    //     // Define Connection
    //     $connection = new Connection();
        
    //     // Make data safe from injection
        $safeTitle = strval($postTitle); 
        $safeBody = strval($postBody); 
        $safeImage = strval($postImage); 

    //     // echo 'Email Address seems new !';
    //     $sql = "UPDATE posts SET post_title='$safeTitle', post_body='$safeBody', post_image='$safeImage' WHERE id='$id';";

    //     // echo $sql . "<br>";

    //     // Check connection
    //     if (!$connection->__construct()) {
    //         die("Connection failed: " . $connection->__construct());
    //     }

    //     // execute query aka insert data
    //     mysqli_query($connection->__construct(), $sql);
        
    //     // close connection
    //     $connection->__construct()->close();

    //     // Redirect to posts page
    //     // header("Location: posts.php");
        
    // }else{
    //     echo "Data does not updated !";
    // }

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'blog';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    
    if(! $conn ) {
       die('Could not connect: ' . mysqli_error());
    }

    $sql = 'UPDATE posts SET post_title="' . $safeTitle . '", post_body="' . $safeBody . '", post_image="' . $safeImage . '" WHERE id="' . $id . '";';
    // echo $sql;

    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
        // Redirect to posts page
        header("Location: posts.php");
    } else {
       echo "Error updating record: " . mysqli_error($conn);
    }
    // close connection
    mysqli_close($conn);
?>