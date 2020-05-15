<?php 
    session_start();
    
    $_SESSION['signin_errors'] = null;

    // Import Coonection file
    require_once('connection.php');

    // Get data from user
    $email = $_POST["email"];
    $password = $_POST["password"];

    // // Define Connection
    $connection = new Connection();

    // Find email and password
    $sql = "SELECT * FROM users WHERE email='$email';";
    // echo $sql . "<br>";
    // echo "Executing <br>";
    // Execute qeury for finding email and password
    $user = mysqli_query($connection->__construct(), $sql);
    // echo "Executed ! <br>";

    if (mysqli_num_rows($user) > 0){
        while($row = mysqli_fetch_array($user)){
            // echo "In Loop ! <br>";
            if ($row['email'] == $email && $row['password'] == $password){
                // echo "If: Login in <br>";
                // echo "If: User  email : " . $email . "<br>";
                // echo "If: Db Email: " . $row['email'] . "<br>";
                $_SESSION['username'] = $row['fullname'];
                $_SESSION['email'] = $row['email'];
                // echo "Username: " . $row['fullname'];
                header("Location: posts.php");
            }//else{
                // echo "Else: User  email : " . $email . "<br>";
                // echo "Else: Db Email: " . $row['email'] . "<br>";
                
                // echo "Else: User  password : " . $password . "<br>";
                // echo "Else: Db password: " . $row['password'] . "<br>";
                
                // echo "Else: You are not log in <br>";
    
                // // Redirect to home page aka login page
                // header("Location: ../index.html");
            //}
        }
    }else{
        // echo "Else: User  email : " . $email . "<br>";
        // echo "Else: Db Email: " . $row['email'] . "<br>";
        
        // echo "Else: User  password : " . $password . "<br>";
        // echo "Else: Db password: " . $row['password'] . "<br>";
        $error = "<div class='alert alert-danger' role='alert'>
                    <strong>Error!</strong> 
                    <a class='alert-link'>try submitting again.</a>
                </div>";
        $_SESSION['signin_errors'] = $error;
        // echo "Else: You are not log in <br>";
        header("Location: ../index.php");
        echo "sasas";
    }

    // echo "------------- After Loop --------------- <br>";
    // echo "Username: " . $_SESSION['username'];

    // close connection
    $connection->__construct()->close();

?>