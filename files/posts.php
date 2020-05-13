<?php 
    // Resume Session
    session_start();

    // Import Coonection file
    require_once('connection.php');

    // Define Connection
    $connection = new Connection();

    $_SESSION['postID'] = 1;
    
    $username = $_SESSION['username'];
    
    $_SESSION['modifications'] = null;

    $_SESSION['modifications'] = "<div class='dropdown' style='position:absolute;top:0; right:0;'>
            <button class='btn dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <span class='dots'>...</span>
            </button>
            <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                <a class='dropdown-item' href='#'>Edit</a>
                <a class='dropdown-item' href='#'>Delete</a>
            </div>
        </div>";

    // $check = "SELECT posts.written_by FROM users, posts;";

    // $results = mysqli_query($connection->__construct(), $check);

    // // Check if user owns these posts aka can delete and edit
    // while ($row = mysqli_fetch_array($results)) {
    //     $writtenBY = $row['written_by'];
        
    //     // echo "-written_by: " . $row['written_by'] . "<br>";
    //     // echo "-username: " . $username . "<br>";
    //     if ($writtenBY == $username){
    //     // echo "If: Written_by: " . $row['written_by'] . " == " . $username . " Username" ."<br>";
    //         $_SESSION['modifications'] = "<div class='dropdown' style='position:absolute;top:0; right:0;'>
    //                                   <button class='btn dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    //                                       <span class='dots'>...</span>
    //                                   </button>
    //                                   <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
    //                                       <a class='dropdown-item' href='#'>Edit</a>
    //                                       <a class='dropdown-item' href='#'>Delete</a>
    //                                   </div>
    //                               </div>";
    //     }else{
    //         $_SESSION['modifications'] = "";
    //         // echo "Else: Written_by: " . $row['written_by'] . " == " . $username . " Username" ."<br>";
    //     }
    // }
    // echo "modifications: " . $_SESSION['modifications'];
    // Check if this user owns this post aka when user create navigate in posts
    // $queryOwner = "SELECT Users.user_id, Posts.post_id, Users.fullname FROM Users, Posts WHERE Users.fullname = '$username' LIMIT 1;";
    // $ownerResult = mysqli_query($connection->__construct(), $queryOwner);
    // while ($query = mysqli_fetch_array($ownerResult)){
    //     $uid = $query['user_id'];
    //     $pid = $query['post_id'];
    //     // echo "User_ID: " . $query['user_id'] . "<br>";
    //     // echo "Post_ID: " . $query['post_id'] . "<br>";
    //     if ($uid == $pid){
    //       $_SESSION['ownerPost'] = $query['fullname'];
    //       $_SESSION['postID'] = $pid;
    //       // echo "" . $_SESSION['ownerPost'];
    //       // echo "From IF";
    //     }else{
    //       // echo "else <br>";
    //     }
    // }
    // echo "Name: " . $_SESSION['ownerPost'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog - Posts</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
                                <span class="text-white nav-item text-uppercase"><?php echo $_SESSION['username'] ?></span>
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
                  $posts = "SELECT post_id, post_title, post_body, post_image, written_by FROM posts;";
                  $all_posts = mysqli_query($connection->__construct(), $posts);
                    while ($row = mysqli_fetch_array($all_posts)) {
                     if ($row['written_by'] == $username){
                        //  echo mysqli_num_rows($all_posts) . "<br>";
                         //echo mysqli_free_result($all_posts);
                         echo "
                         <div class='container col-md-4 col-lg-4 mt-4'>
                             <div class='card' style='height : 430px'>
                             <div class='container' id='userimage'>
                                 <img width='29' height='29' style='border-radius: 50%;' src='https://images.pexels.com/photos/2253415/pexels-photo-2253415.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' alt=''>
                                 <span>" . $row['written_by'] . "</span>" .
                             "</div>" . $_SESSION['modifications'] .
                                 "<a href='#' style='height : 400px'><img class='card-img-top card-image w-100 h-75'" . "src=" .$row['post_image'] . "alt='#'></a>". "
                                     
                                 <div class='card-body'> 
                                     <h2 style='margin-top:-25px' class='card-title text-center text-muted'>" . $row['post_title'] . "</h2>             
                                 </div>
                                 </div>
                     </div>";
                     }else{
                        echo "
                        <div class='container col-md-4 col-lg-4 mt-4'>
                            <div class='card' style='height : 430px'>
                            <div class='container' id='userimage'>
                                <img width='29' height='29' style='border-radius: 50%;' src='https://images.pexels.com/photos/2253415/pexels-photo-2253415.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' alt=''>
                                <span>" . $row['written_by'] . "</span>" .
                            "</div>" . 
                                "<a href='#' style='height : 400px'><img class='card-img-top card-image w-100 h-75'" . "src=" .$row['post_image'] . "alt='#'></a>". "
                                    
                                <div class='card-body'> 
                                    <h2 style='margin-top:-25px' class='card-title text-center text-muted'>" . $row['post_title'] . "</h2>             
                                </div>
                                </div>
                    </div>";
                     }
                  }
                ?>
            </div>
          </div>
        
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>