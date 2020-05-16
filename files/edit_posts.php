<?php 
    session_start(); 

    // Import connection file
    require_once('connection.php');
    require_once('preventAccess.php');


    // Define connection 
    $connection = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - Create new post</title>
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="posts.php">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item list">
                  <a class="nav-link link" href="posts.php">Posts</a>
              </li>
              <li class="nav-item list">
                <a class="nav-link link" href="create_new_post.php">Create new post</a>
              </li>
              <li class="nav-item list">
                        <div class='dropdown'>
                            <button class='btn dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class="text-white nav-item">Sofia</span>
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                                <a class='dropdown-item' href='logout.php'>Logout</a>
                            </div>
                        </div>
                    </li>
            </ul>
          </div>  
        </nav>
        <!-- Form for add new posts -->
        <div class="container mt-2">
            <div class="row">
                <div class="container col-sm-12 col-md-6 col-lg-4">
                    <h2 class="text-muted">Edit Post</h2>
                    <?php 
                        $id = $_GET['EditPid'];
                        $getId = "SELECT * FROM posts WHERE id='$id';";
                        $post = mysqli_query($connection->__construct(), $getId);
                        while($row = mysqli_fetch_array($post)){
                            echo "
                            <form method='POST' action='edit_posts_controller.php?EditPid=" . $id . "' class='mt-4' id='signup'>
                                <div class='form-group'>
                                    <label for='fullname'>Post Title</label>
                                    <input type='text' class='form-control' name='post-title' id='post-title' value='" . $row['post_title'] . "' required>
                                </div>

                                <div class='form-group'>
                                    <label for='post-body'>Post Body</label>
                                    <textarea class='form-control' name='post-body' id='post-body' cols='30' rows='10'>" . $row['post_body'] ."</textarea>
                                </div>

                                <div class='form-group'>
                                    <label for='post-image'>Post Image</label>
                                    <input type='text' class='form-control' name='post-image' id='post-image' value='" . $row['post_image'] . "' required>
                                </div>

                                <button type='submit' class='main-color btn text-white w-100'>Submit</button>
                            </form>
                        ";
                        }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>