<?php
    session_start();
    $_SESSION['username'] = null;
    $_SESSION['postID'] = null;
    $_SESSION['email'] = null;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Blog - Login or Signup</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/media.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <link rel="shortcut icon" href="img/logo.png"  type="image/x-icon">
    </head>
    <body>
        <div class="container mt-4">
            <?php 
                if (!isset($_SESSION['signin_errors'])){
                    echo "";
                }else{
                    echo $_SESSION['signin_errors'];
                }
            ?>
            <div class="row">
                <div class="container col-sm-12 col-md-6 col-lg-4">
                    <h2 class="text-muted">Sign Up</h2>
                    <form method="POST" action="files/signup.php" class="mt-4" id="signup">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter fullname" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                        </div>
       
                        <button type="submit" class="main-color btn text-white w-100">Submit</button>
                    </form>
                </div>

                <!-- Middle Line -->
                <div class="middle-line main-color"></div>

                <div class="container mt-4 col-sm-12 col-md-6 col-lg-4">
                    <h2 class="text-muted">Login</h2>
                    <form method="POST" action="files/signin.php" class="mt-4" id="signin">
                        <div class="form-group">
                            <label for="signin-email">Email address</label>
                            <input type="email" class="form-control" name="email" id="signin-email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-password">Password</label>
                            <input type="password" class="form-control" name="password" id="signin-password" placeholder="Password" required>
                        </div>
 
                        <button type="submit" class="main-color text-white btn w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/validation.js"></script>
    </body>
</html>