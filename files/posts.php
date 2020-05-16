<?php 
    // Resume Session
    session_start();

    // Import Coonection file
    require_once('connection.php');
    require_once('preventAccess.php');

    // Define Connection
    $connection = new Connection();
    
    $username = $_SESSION['username'];

    $_SESSION['EditPid'] = null;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - Posts</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark">
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

        <div class="container">
            <div class="row">
                <!-- Reading Posts From Dtabase -->
                <?php
                  $posts = "SELECT * FROM posts;";
                  $all_posts = mysqli_query($connection->__construct(), $posts);
                    while ($row = mysqli_fetch_array($all_posts)) {
                     if ($row['written_by'] == $username){
                        //  echo "Username: " . $username;
                         echo "
                         <div class='container col-md-4 col-lg-4 mt-4'>
                             <div class='card' style='height : 430px'>
                             <div class='container' id='userimage'>
                                 <img width='29' height='29' style='border-radius: 50%;' src='https://images.pexels.com/photos/2253415/pexels-photo-2253415.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' alt=''>
                                 <span class='text-capitalize'>" . $row['written_by'] . "</span>" .
                             "</div><div class='dropdown' style='position:absolute;top:0; right:0;'>
                             <button class='btn dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                 <span class='dots'>...</span>
                             </button>
                             <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                                 <a class='dropdown-item' href='edit_posts.php?EditPid=" . $row['id'] . "'>Edit</a>
                                 <a class='dropdown-item' href='delete_post.php?deletePid=" . $row['id'] . "'>Delete</a>
                             </div>
                         </div><a href=post_details.php?detailId=" . $row['id'] . " style='height : 400px'><img class='card-img-top card-image w-100 h-75'" . "src=" .$row['post_image'] . "alt='#'></a>". "
                                     
                                 <div class='card-body'> 
                                     <h2 style='margin-top:-25px' class='card-title text-center text-muted text-capitalize'>" . $row['post_title'] . "</h2>             
                                 </div>
                                 </div>
                     </div>";
                     }else{
                        echo "
                        <div class='container col-md-4 col-lg-4 mt-4'>
                            <div class='card' style='height : 430px'>
                            <div class='container' id='userimage'>
                                <img width='29' height='29' style='border-radius: 50%;' src='https://images.pexels.com/photos/2253415/pexels-photo-2253415.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' alt=''>
                                <span class='text-capitalize'>" . $row['written_by'] . "</span>" .
                            "</div>" . 
                                "<a href=post_details.php?detailId=" . $row['id'] . " style='height : 400px'><img class='card-img-top card-image w-100 h-75'" . "src=" .$row['post_image'] . "alt='#'></a>". "
                                    
                                <div class='card-body'> 
                                    <h2 style='margin-top:-25px' class='card-title text-center text-muted text-capitalize'>" . $row['post_title'] . "</h2>             
                                </div>
                                </div>
                    </div>";
                     }
                  }

                //   echo "FinalEditPid : " . $_SESSION['EditPid'];
                ?>
            </div>
          </div>
        
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>