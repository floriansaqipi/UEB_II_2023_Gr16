<?php $page = "profile"; ?>
<?php include "includes/header.php"; ?>
<?php isLoggedInRegular(); ?>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include "includes/navabar.php"; ?>

    <!-- Navbar End -->





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span class="text-dark">Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span class="text-dark">CRUD</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span class="text-dark">Settings</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>



            <body>
                <div class="col">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <?php editUserRegularInputs();
                                        ?>
                                        <?php editUserRegular();
                                        ?>
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded edit-profile-container__image--profile" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                        <img width="140" height="140" class="edit-profile__image--profile" src="images/<?php echo $image; ?>" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $firstname . " " . $lastname; ?></h4>
                                                    <p class="mb-0"><?php echo $user; ?></p>
                                                    <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                                    <div class="mt-2">
                                                        <a href="./edit-password.php" class="btn btn-primary">
                                                            <i class="fa fa-fw fa-lock"></i>
                                                            <span>Change Paasword</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <span class="badge badge-secondary">administrator</span>
                                                    <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <form action="" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                                                    <div class="col-md-6">
                                                        <label for="validationServer01" class="form-label">Username</label>
                                                        <input name="username" type="text" class="form-control <?php echo !empty($usernameErr) ? "is-invalid" : "" ?>" id="validationServer01" value="<?php echo $username; ?>" placeholder="Enter your username" required>
                                                        <div class="invalid-feedback">
                                                            <?php echo $usernameErr; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationServer03" class="form-label">Email</label>
                                                        <input name="user_email" type="email" class="form-control <?php echo !empty($emailErr) ? "is-invalid" : "" ?>" id="validationServer03" value="<?php echo $user_email; ?>" aria-describedby="validationServer03Feedback" placeholder="Enter your Email" required>
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            <?php echo $emailErr; ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationServer01" class="form-label">First name</label>
                                                        <input name="user_firstname" type="text" class="form-control <?php echo !empty($firstnameErr) ? "is-invalid" : "" ?>" id="validationServer01" value="<?php echo $user_firstname; ?>" placeholder="Enter your First name" required>
                                                        <div class="invalid-feedback">
                                                            <?php echo $firstnameErr; ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="validationServer02" class="form-label">Last name</label>
                                                        <input name="user_lastname" type="text" class="form-control <?php echo !empty($lastnameErr) ? "is-invalid" : "" ?>" id="validationServer02" value="<?php echo $user_lastname; ?>" placeholder="Enter your Last name" required>
                                                        <div class="invalid-feedback">
                                                            <?php echo $lastnameErr; ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <label for="validationPost" class="form-label">Profile Image</label>
                                                        <img width="128" class="edit-post-form__image" src="images/<?php echo $user_image; ?>" alt="image">

                                                        <input name="user_image"  type="file" class="form-control <?php echo !empty($imageErr) ? "is-invalid" : "" ?>" aria-label="file example" required>
                                                        <div class="invalid-feedback">
                                                            <?php echo $imageErr; ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <label for="validationPost" class="form-label">Cover Image</label>
                                                        <img width="192" height="128" class="edit-post-form__image" src="images/<?php echo $user_cover_image; ?>" alt="image">

                                                        <input name="user_cover_image" type="file" class="form-control <?php echo !empty($coverImageErr) ? "is-invalid" : "" ?>" aria-label="file example" required>
                                                        <div class="invalid-feedback"><?php echo $coverImageErr; ?></div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <label for="inputEmail2" class="col-sm-2 col-form-label">Bio</label>
                                                        <div class="col-sm-12">
                                                            <input name="user_bio" type="email" class="form-control" id="inputEmail2" value="<?php echo $user_bio; ?>" placeholder="Enter you bio">
                                                        </div>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">About</label>
                                                        <textarea name="user_about" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter something about you"><?php echo $user_about; ?></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col d-flex justify-content">
                                                            <button name="edit-user" class="btn btn-primary" type="submit">Save
                                                                Changes</button>
                                                        </div>
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-block btn-primary">
                                                                <i class="fa fa-sign-out"></i>
                                                                <span>Logout</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 mb-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="px-xl-3">
                                        <button class="btn btn-block btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-sign-out"></i>
                                            <span>Delete my account</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting your account will remove all your information from out databse.This
                                            cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <?php deleteCurrentUserAccount(); ?>
                                            <form action="" method="post">
                                                <button  type="submit" name="delete-account" class="btn btn-danger">Delete Account</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold">Support</h6>
                                    <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                    <button type="button" class="btn btn-primary">Contact Us</button>
                                </div>
                            </div>
                            <div class="card mb-10">
                                <div class="card-body">
                                    <div class="px-xl-3">
                                        <button class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#comment">
                                            <i class="fa fa-comment"></i>
                                            <span>Edit Comment</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="comment" tabindex="-1" aria-labelledby="comment" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="comment">Edit Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Comments</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Edit comment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
        </div>
    </div>
    </body>



    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>