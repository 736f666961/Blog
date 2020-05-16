<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - Create new post</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
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
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>   -->
              <li class="nav-item list">
                        <div class='dropdown'>
                            <button class='btn dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class="text-white nav-item"><?php echo $_SESSION['username'] ?></span>
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
                    <h2 class="text-muted">Create new post</h2>
                    <form method="POST" action="add_post.php" class="mt-4" id="signup">
                        <div class="form-group">
                            <label for="fullname">Post Title</label>
                            <input type="text" class="form-control" name="post-title" id="post-title" placeholder="Enter title os post" required>
                        </div>

                        <div class="form-group">
                            <label for="post-body">Post Body</label>
                            <textarea class="form-control" placeholder="Enter post body" name="post-body" id="post-body" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="post-image">Post Image</label>
                            <input type="text" class="form-control" name="post-image" id="post-image" placeholder="Enter the url of post image" >
                        </div>
       
                        <button type="submit" class="main-color btn text-white w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>