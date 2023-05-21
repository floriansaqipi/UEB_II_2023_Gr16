<?php $page = "profile"; ?>
<?php include "includes/header.php"; ?>
<?php isLoggedInRegular(); ?>
<?php checkCommentPrivileges(); ?>
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



    <div class="container-xxl bg-white p-5">
        <div class="main-header" style="margin-top: 0px;">
            <h4>Add Comment</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item path__spacing"><a href="index.php"><i class="bi bi-house-door-fill"> &nbsp;</i></a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php">/ Profile &nbsp; </a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php?source=all_comments">/ Your Comments &nbsp; </a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php?source=all_comments"<?php echo isset($_GET["c_id"]) ? $_GET["c_id"] : "" ?>">/ Edit a Comment</a>
                </li>
            </ol>
            <div class="col-12 header__go-back-button">
                <a class="btn btn-primary mx-2" href="userprofile.php?source=all_comments" role="button"><i class="bi bi-skip-backward-fill"></i> &nbsp; Go Back</a>
            </div>

        </div>
        <?php getCommentContent(); ?>
        <?php editCommentRegular(); ?>


        <form action="" method="post" class="card add-post-user-spacing" enctype="multipart/form-data" novalidate>

            <div class="mb-3">
                <label for="validationContent" class="form-label">Content</label>
                <textarea name="comment_content" class="form-control <?php echo !empty($contentErr) ? "is-invalid" : "" ?>" id="validationContent" placeholder="Enter description" required><?php echo $comment_content; ?></textarea>
                <div class="invalid-feedback">
                    <?php echo $contentErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="edit-comment">Edit Comment</button>
            </div>

        </form>
    </div>


    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>