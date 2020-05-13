<?php
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - User</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar bg-dark navbar-expand-lg navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="user.php">Blog</a>
          
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav" style="width: 99%;">
                <li class="nav-item" style="margin-left: 26%;">
                  <a class="nav-link" href="posts.php">Posts</a>
                </li>

                <li class="nav-item" style="margin-left: 20%;">
                  <a class="nav-link" href="create_new_post.php" style="width: 200px;">Create new post</a>
                </li>

                <li class="nav-item" style="margin-left: 10%;">
                  <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?> </a>
                </li>
              </ul>
            </div>
        </nav>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>