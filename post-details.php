<?php include "includes/header.php"; ?>

<!-- ***** Preloader Start ***** -->
<!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
<!-- ***** Preloader End ***** -->

<!-- Header -->
<?php include "includes/navabar.php"; ?>




<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
      <?php include  "includes/single-post.php"; ?>
        
      </div>
      <div class="col-lg-4">
        <div class="sidebar">
          <div class="row">
            <div class="col-lg-12">
              <div class="sidebar-item search">
                <form id="search_form" name="gs" method="GET" action="#">
                  <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                </form>
              </div>
            </div>
            <?php include "includes/recent-posts.php"; ?>

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


<?php include "includes/footer.php"; ?>