<?php 
    session_start();
    
    // Import Coonection file
    require_once('connection.php');

    // Get data from user
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Define Connection
    $connection = new Connection();

    // Find name of this user
    $findName = "SELECT fullname FROM users WHERE password=$password";

    // Execute qeury for finding name
    $user = mysqli_query($connection->__construct(), $findName);

    // Check if email is not alreafy exists
    if ($connection->checkEmailExistence($email) && $connection->checkPasswordExistence($password)){         
        echo 'login';
        
        // Iterate through rows until you find username
        while($row = mysqli_fetch_array($user)){
            // Store username in session
            $_SESSION['username'] = $row['fullname'];
            // echo "You are : " . "<h3>" . $row['fullname'] . "</h3>";

            // Redirect to user page
            header("Location: posts.php");
        }
        
    }else{
        echo 'not login !';

        // close connection
        $connection->__construct()->close();

        // Redirect to home page aka login page
        header("Location: ../index.html");
    }
?>