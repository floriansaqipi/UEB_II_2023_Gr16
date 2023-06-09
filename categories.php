<?php $page = "feed"; ?>
<?php include "includes/header.php"; ?>
<!-- ***** Preloader Start ***** -->
<!-- <div id="preloader">
  <div class="jumper">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div> -->
<!-- ***** Preloader End ***** -->

<!-- Header -->
<?php include "includes/navabar.php"; ?>


<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
      <div class="item">
        <img src="assets/images/banner-item-01.jpg" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>Fashion</span>
            </div>
            <a href="post-details.html">
              <h4>Morbi dapibus condimentum</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">Admin</a></li>
              <li><a href="#">May 12, 2020</a></li>
              <li><a href="#">12 Comments</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="assets/images/banner-item-02.jpg" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>Nature</span>
            </div>
            <a href="post-details.html">
              <h4>Donec porttitor augue at velit</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">Admin</a></li>
              <li><a href="#">May 14, 2020</a></li>
              <li><a href="#">24 Comments</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="assets/images/banner-item-03.jpg" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>Lifestyle</span>
            </div>
            <a href="post-details.html">
              <h4>Best HTML Templates on TemplateMo</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">Admin</a></li>
              <li><a href="#">May 16, 2020</a></li>
              <li><a href="#">36 Comments</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="assets/images/banner-item-04.jpg" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>Fashion</span>
            </div>
            <a href="post-details.html">
              <h4>Responsive and Mobile Ready Layouts</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">Admin</a></li>
              <li><a href="#">May 18, 2020</a></li>
              <li><a href="#">48 Comments</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="assets/images/banner-item-05.jpg" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>Nature</span>
            </div>
            <a href="post-details.html">
              <h4>Cras congue sed augue id ullamcorper</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">Admin</a></li>
              <li><a href="#">May 24, 2020</a></li>
              <li><a href="#">64 Comments</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="assets/images/banner-item-06.jpg" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span>Lifestyle</span>
            </div>
            <a href="post-details.html">
              <h4>Suspendisse nec aliquet ligula</h4>
            </a>
            <ul class="post-info">
              <li><a href="#">Admin</a></li>
              <li><a href="#">May 26, 2020</a></li>
              <li><a href="#">72 Comments</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->




<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <div class="col-lg-12" id="posts-container">

              <?php include "includes/category-posts.php"; ?>  
            </div>
        <div class="col-lg-12">
          <div class="main-button" >
            <a id="load-more-button" href="index.php">Load More Posts</a>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="sidebar">
        <div class="row">
          <div class="col-lg-12">
          
          <?php include "includes/recent-posts.php"; ?>
          <!-- Categories -->
          <?php include "includes/feed-categories.php"; ?>
          <div class="col-lg-12">
            <div class="sidebar-item tags">
              <div class="sidebar-heading">
                <h2>Tag Clouds</h2>
              </div>
              <div class="content">
                <ul>
                  <li><a href="#">Lifestyle</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">HTML5</a></li>
                  <li><a href="#">Inspiration</a></li>
                  <li><a href="#">Motivation</a></li>
                  <li><a href="#">PSD</a></li>
                  <li><a href="#">Responsive</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<?php include "includes/categories-scripts.php" ?>
<?php include "includes/footer.php" ?>