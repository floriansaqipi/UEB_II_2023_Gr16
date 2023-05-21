<?php $page = "profile"; ?>
<?php include "includes/header.php"; ?>
<?php //isLoggedInRegular(); 
?>
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


    <?php getUserViewProfileData(); ?>
    <?php getUserViewPostCount(); ?>
    <?php getUserViewCommentCount(); ?>
    <main>
        <div class="container">
        </div>
        <div class="img" style="    background-image: linear-gradient(150deg, rgba(63, 174, 255, .3)15%, rgba(63, 174, 255, .3)70%, rgba(63, 174, 255, .3)94%), url(images/<?php echo $user_cover_image; ?>);height: 350px;background-size: cover;"></div>

        <div class="card social-prof">
            <div class="card-body">
                <div class="wrapper">
                    <img src="images/<?php echo $user_image; ?>" alt="image" class="user-profile">
                    <h3><?php echo $user_firstname . " " . $user_lastname; ?></h3>
                    <p><?php echo $user_bio; ?></p>
                </div>
            </div>
        </div>


        <?php $sub_page = "timeline" ?>
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
                                <?php include "includes/view-user-profile-post-slider.php"; ?>
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
                <?php include "includes/view-other-user-profile-posts.php"; ?>  
                <!-- Post /////-->

            </div>
            <div class="col-lg-3">
                <div class="card social-timeline-card">
                    <div class="card-body">
                        <h5 class="card-title">People you may know</h5>
                        <ul class="friend-list">
                            <?php include "includes/view-other-users.php"; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>



</div>
</main>
<!-- Footer Start -->
<?php include "includes/footer.php"; ?>