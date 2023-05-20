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
        </div>


        <!-- Post /////-->

        <?php include "includes/profile-posts.php"; ?>  
    
        <!-- Post /////-->
        


    </div>
    <div class="col-lg-3">
        <div class="card social-timeline-card">
            <div class="card-body">
                <h5 class="card-title">People you may know</h5>
                <ul class="friend-list">
                    <?php include "includes/other-users.php"; ?>

                </ul>
            </div>
        </div>
    </div>
</div>