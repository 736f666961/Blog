<?php
    session_start();
    
    $_SESSION['signin_errors'] = null;

    // Import Coonection file
    require_once('connection.php');

    // Import setterGetterData File
    require_once('setterGetterData.php');

    // import class we need
    $setGetData = new setterGetterData();

    // Set data got from user
    $setGetData->setEmail($_POST["email"]);
    $setGetData->setPassword($_POST["password"]);

    // Define Connection
    $connection = new Connection();

    // Get email
    $email = $setGetData->getEmail();

    // Find email 
    $sql = "SELECT * FROM users WHERE email='$email';";

    // Execute command "Find Email"
    $user = mysqli_query($connection->__construct(), $sql);

    // Check at least there's one row AKA user exists
    if (mysqli_num_rows($user) > 0){
        while($row = mysqli_fetch_array($user)){
            // Check if data match
            if ($row['email'] == $setGetData->getEmail() && $row['password'] == $setGetData->getPassword()){
                // Set super global variables AkA session
                $_SESSION['username'] = $row['fullname'];
                $_SESSION['email'] = $row['email'];

                // Redirect to posts page
                header("Location: posts.php");
            }
        }
    }else{
        // Set error when login data does not exists
        $error = "<div class='alert alert-danger' role='alert'>
                    <strong>Error!</strong> 
                    <a class='alert-link'>incorrect email and password</a> Try submitting again.
                </div>";
        $_SESSION['signin_errors'] = $error;

        // Redirect to home page
        header("Location: ../index.php");
    }

    // close connection
    $connection->__construct()->close();

?>