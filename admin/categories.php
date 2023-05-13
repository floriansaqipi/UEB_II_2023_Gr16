<?php $page = "categories"; ?>
<?php include "includes/header.php"; ?>
<?php include "functions.php"; ?>

<!-- <div class="wrapper">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div> -->
   <!-- Navbar-->
   <?php include "includes/navbar.php"; ?>
   <!-- Side-Nav-->
   <?php include "includes/side-navbar.php"; ?>

   <!-- Sidebar chat start -->
   <div id="sidebar" class="p-fixed header-users showChat">
      <div class="had-container">
         <div class="card card_main header-users-main">
            <div class="card-content user-box">

               <div class="md-group-add-on p-20">
                  <span class="md-add-on">
                     <i class="icofont icofont-search-alt-2 chat-search"></i>
                  </span>
                  <div class="md-input-wrapper">
                     <input type="text" class="md-form-control" name="username" id="search-friends">
                     <label>Search</label>
                  </div>

               </div>
               <div class="media friendlist-main">

                  <h6>Friend List</h6>

               </div>
               <div class="main-friend-list">
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Alice</div>
                        <span>1 hour ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="7" data-status="offline" data-username="Michael Scofield" data-toggle="tooltip" data-placement="left" title="Michael Scofield">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-3.png" alt="Generic placeholder image">
                        <div class="live-status bg-danger"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Michael Scofield</div>
                        <span>3 hours ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="5" data-status="online" data-username="Irina Shayk" data-toggle="tooltip" data-placement="left" title="Irina Shayk">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-4.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Irina Shayk</div>
                        <span>1 day ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="6" data-status="offline" data-username="Sara Tancredi" data-toggle="tooltip" data-placement="left" title="Sara Tancredi">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-5.png" alt="Generic placeholder image">
                        <div class="live-status bg-danger"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Sara Tancredi</div>
                        <span>2 days ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Alice</div>
                        <span>1 hour ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Alice</div>
                        <span>1 hour ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Alice</div>
                        <span>1 hour ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
                  <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                     <a class="media-left" href="#!">
                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        <div class="live-status bg-success"></div>
                     </a>
                     <div class="media-body">
                        <div class="friend-header">Josephin Doe</div>
                        <span>20min ago</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <div class="showChat_inner">
      <div class="media chat-inner-header">
         <a class="back_chatBox">
            <i class="icofont icofont-rounded-left"></i> Josephin Doe
         </a>
      </div>
      <div class="media chat-messages">
         <a class="media-left photo-table" href="#!">
            <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png" alt="Generic placeholder image">
            <div class="live-status bg-success"></div>
         </a>
         <div class="media-body chat-menu-content">
            <div class="">
               <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
               <p class="chat-time">8:20 a.m.</p>
            </div>
         </div>
      </div>
      <div class="media chat-messages">
         <div class="media-body chat-menu-reply">
            <div class="">
               <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
               <p class="chat-time">8:20 a.m.</p>
            </div>
         </div>
         <div class="media-right photo-table">
            <a href="#!">
               <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png" alt="Generic placeholder image">
               <div class="live-status bg-success"></div>
            </a>
         </div>
      </div>
      <div class="media chat-reply-box">
         <div class="md-input-wrapper">
            <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
            <label>Share your thoughts</label>
            <span class="highlight"></span>
            <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
               <i class="icofont icofont-location-arrow f-20 "></i>
            </button>

         </div>

      </div>
   </div>
   <!-- Sidebar chat end-->
   <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <div class="container-fluid">
         <!-- Main content starts -->
         <div>
            <!-- Row Starts -->
            <div class="row">
               <div class="col-sm-12 p-0">
                  <div class="main-header">
                     <h4>Manage Categories</h4>
                     <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="categories.php">Categories</a>
                        </li>
                        <li class="breadcrumb-item"><a href="form-elements-bootstrap.html">Manage Categories</a>
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
               <!-- Form Control starts -->
               <!-- Form Control ends -->

               <!-- Textual inputs starts -->
               <div class="col-lg-6">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-header-text">Add category</h5>
                        </div>

                        <!-- end of modal -->
                        <?php insertCategory(); ?>
                        <div class="card-block">
                           <form action="" method="post">
                              <div class="form-group row <?php echo !empty($insertNameErr) ? "has-danger" : "" ?>">
                                 <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Category</label>
                                 <div class="col-sm-10">
                                    <input class="form-control" type="text" name="category" value="<?php echo $cat_name; ?>" id="example-text-input" placeholder="Add a category">
                                    <div class="form-control-feedback"><?php echo $insertNameErr; ?></div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-inverse-success waves-effect waves-light">Add</button>
                                 </div>
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <?php
                  if (isset($_GET["edit"])) {
                     include "includes/edit-category-form.php";
                  }
                  ?>


               </div>
               <div class="col-lg-6">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-header-text">Categories</h5>

                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table categories-table">
                                 <thead>
                                    <tr>
                                       <th>Id</th>
                                       <th>Category Name</th>
                                       <th></th>
                                       <th></th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php getAllCategoriesAdminTable(); ?>
                                    <?php deleteCategory(); ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Textual inputs ends -->
         </div>
         <!-- Row end -->



      </div>
      <!-- Main content ends -->
   </div>
   <!-- Container-fluid ends -->
</div>
</div>

<?php include "includes/footer.php"; ?>