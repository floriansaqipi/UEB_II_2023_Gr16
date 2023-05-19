<?php $page = "profile"; ?>
<?php include "includes/header.php"; ?>
<?php isLoggedInRegular(); ?>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="css/userprofile.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="css/added.css" rel="stylesheet">

    <!-- Navbar Start -->
    <?php include "includes/navabar.php"; ?>

    <!-- Navbar End -->


    <?php getUserProfileData(); ?>
    <?php getUserPostCount(); ?>
    <?php getUserCommentCount(); ?>
    <main>
        <div class="container">

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your account?</p>
                            <p>This action cannot be undone and all your data will be permanently removed.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img" style="    background-image: linear-gradient(150deg, rgba(63, 174, 255, .3)15%, rgba(63, 174, 255, .3)70%, rgba(63, 174, 255, .3)94%), url(images/<?php echo $user_cover_image; ?>);height: 350px;background-size: cover;"></div>

            <div class="card social-prof">
                <div class="card-body">
                    <div class="wrapper">
                        <img src="images/<?php echo $user_image; ?>" alt="image" class="user-profile">
                        <h3><?php echo $user_firstname . " " . $user_lastname; ?></h3>
                        <p><?php echo $user_bio; ?></p>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12">
                            <ul class=" nav nav-tabs justify-content-center s-nav">
                                <li><a style="" class="<?php echo !isset($_GET["source"]) ? "active" : "" ?>" href="userprofile.php">Timeline</a></li>
                                <li><a href="userprofile.php?source=all_posts" class="<?php echo isset($_GET["source"]) && $_GET["source"] == "all_posts" ? "active" : "" ?>" >Your posts</a></li>
                                <li><a href="userprofile.php?source=all_comments" class="<?php echo isset($_GET["source"]) && $_GET["source"] == "all_comments" ? "active" : "" ?>" >Your comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5 text-primary">@<?php echo $username; ?></div>
                            <div class="h7 "><strong>Name : </strong><?php echo $user_firstname . " " . $user_lastname; ?></div>
                            <div class="h7"><strong>About : </strong><?php echo $user_about; ?></div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="h6 text-muted">Posts</div>
                                <div class="h5"><?php echo $post_count; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Comments</div>
                                <div class="h5"><?php echo $comment_count; ?></div>
                            </li>

                            
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Latest Posts</h3>
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php include "includes/user-profile-post-slider.php"; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 gedf-main">
                    <!--- \\\\\\\Post-->
                    <div class="container-xxl bg-white p-3 user-profile-buttons__spacing">
                        <a class="btn btn-primary mx-2" href="./add-post.php" role="button">Add a post</a>
                        <a class="btn btn-primary mx-2" href="./edit-profile.php">
                            <i class="fa fa-pencil"></i>
                            <span>Edit profile</span>
                        </a>
                        <button class="btn btn-block btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-sign-out"></i>
                            <span>Delete my account</span>
                        </button>
                    </div>


                    <!-- Post /////-->

                    <div class="card social-timeline-card">



                        <div class="card-body">


                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Category</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Category</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>


                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                            <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                            <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                        </div>
                    </div>
                    <div class="card social-timeline-card">


            <?php
         if (isset($_GET["source"])) {
            $source = $_GET["source"];
         } else {
            $source = "";
         }

         switch ($source) {
            case 'all_posts';
               include "includes/user-profile-posts.php";
               break;
            case 'all_comments';
               include "includes/user-profile-comments.php";
               break;
            default:

               include "includes/user-profile-timeline.php";
         }
         ?>

            

        </div>
    </main>
    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>