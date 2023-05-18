<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobEntry</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?php echo $page == "home" ? "active" : " " ?>">Home</a>
            <a href="feed.php" class="nav-item nav-link <?php echo $page == "feed" ? "active" : " " ?>">Feed</a>
            <?php if (isset($_SESSION["user_id"])) {
            ?>
                <a href="userprofile.php" class="nav-item nav-link">Your Profile</a>
            <?php
                }
            ?>
            <!-- <a href="blog.php" class="nav-item nav-link">Blog</a> -->
            <a href="about.php" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="job-list.html" class="dropdown-item">Job List</a>
                    <a href="job-detail.html" class="dropdown-item">Job Detail</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="category.php" class="dropdown-item">Job Category</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    <a href="404.php" class="dropdown-item">404</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <?php
            if (isset($_SESSION["user_id"])) {

            ?>
                <a href="logout.php" class="nav-item nav-link ">Log out</a>
            <?php
            } else {
            ?>
                <a href="login.php" class="nav-item nav-link  <?php echo $page == "login" ? "active" : "" ?>">Log in</a>

            <?php
            }
            ?>
        </div>
        <a href="register.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block post-a-job">Register<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>