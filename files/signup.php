<?php
    session_start();

    // Import Coonection file
    require_once('connection.php');

    // Get data from user
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check user data
    if (preg_match("/^([a-zA-Z]+)$/", $fullname) && filter_var($email, FILTER_VALIDATE_EMAIL) && ($password != null || $password != "")){
        // Define Connection
        $connection = new Connection();
        
        // Make data safe from injection
        $safeName = mysqli_real_escape_string($connection->__construct(), $fullname);
        $safeEmail = mysqli_real_escape_string($connection->__construct(), $email);
        $safePassword = mysqli_real_escape_string($connection->__construct(), $password);

        // Check if email is not alreafy exists
        if ($connection->checkEmailExistence($safeEmail)){         
            echo 'Email Address is Already In Use.';
            
        }else{
            // echo 'Email Address seems new !';
            $sql = "INSERT INTO users (fullname, email, password) VALUES ('" . $safeName . "',". "'" . $safeEmail . "'," . "'" . $safePassword . "')";
            
            $_SESSION['username'] = $fullname;

            // execute query aka insert data
            mysqli_query($connection->__construct(), $sql);

            // close connection
            $connection->__construct()->close();

            // Redirect to 
            header("Location: posts.php");
        }



        // echo $safeName . "<br/>" . $safeEmail . "<br/>" .$safePassword;
    }else{
        // echo "Data does not match !";
    }
?>