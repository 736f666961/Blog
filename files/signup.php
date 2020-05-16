<?php
    session_start();

    // Import Coonection file
    require_once('connection.php');

    // Import setterGetterData File
    require_once('setterGetterData.php');
    require_once('preventAccess.php');

    // import class we need
    $setGetData = new setterGetterData();

    // Set data got from user
    $setGetData->setName($_POST["fullname"]);
    $setGetData->setEmail($_POST["email"]);
    $setGetData->setPassword($_POST["password"]);

    // Check user data
    if (preg_match("/^([a-zA-Z]+)$/", $setGetData->getName()) && 
        filter_var($setGetData->getEmail(), FILTER_VALIDATE_EMAIL) && 
        ($setGetData->getPassword() != null || $setGetData->getPassword() != "")){

        // Define Connection
        $connection = new Connection();
        
        // Get data and make it safe from injection
        $safeName = mysqli_real_escape_string($connection->__construct(), $setGetData->getName());
        $safeEmail = mysqli_real_escape_string($connection->__construct(), $setGetData->getEmail());
        $safePassword = mysqli_real_escape_string($connection->__construct(), $setGetData->getPassword());

        // Check if email is not alreafy exists
        if ($connection->checkEmailExistence($safeEmail)){         
            echo 'Email Address is Already In Use.';
            
        }else{
            // echo 'Email Address seems new !';
            $sql = "INSERT INTO users (fullname, email, password) VALUES ('" . $safeName . "',". "'" . $safeEmail . "'," . "'" . $safePassword . "')";
            
            $_SESSION['username'] = $safeName;
            $_SESSION['email'] = $safeEmail;

            // execute query aka insert data
            mysqli_query($connection->__construct(), $sql);

            // close connection
            $connection->__construct()->close();

            // Redirect to 
            header("Location: posts.php");
        }
    }else{
        // echo "Data does not match !";
    }
?>