<?php
    session_start();

    // Import Coonection file
    require_once('connection.php');

    // Define Connection
    $connection = new Connection();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - Post Destails</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                <span class="text-white nav-item text-capitalize"><?php echo $_SESSION['username'] ?><i class="fa fa-angle-down"></i></span>
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                                <a class='dropdown-item' href='logout.php'>Logout</a>
                            </div>
                        </div>
                    </li>
            </ul>
          </div>  
        </nav>

        <!-- Showing post details -->
        <?php
          // post details id
          $id = $detailId = $_GET['detailId'];
          $sql = "SELECT * FROM posts WHERE id='$id';";
          $postDetails = mysqli_query($connection->__construct(), $sql);
          while ($row = mysqli_fetch_array($postDetails)){
              echo "
                <div class='container mt-4'>
                <div class='row mt-4 justify-content-center'>
                  <div class='col-md-4 col-lg-4'>
                      <img class='h-100 w-100' src='" . $row['post_image'] . "' alt=''>
                  </div>
                  <div class='col-md-4 col-lg-4'>
                      <h1 class='text-center text-muted text-capitalize'>" . $row['post_title'] . "</h1>
                      <p>" . $row['post_body'] . "</p>
                      <p><strong>Written by : </strong><i class='text-capitalize'>" . $row['written_by'] . "</i></p>
                    </div>
                </div>
              </div>
              ";
          }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>