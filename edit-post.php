<?php $page = "profile"; ?>
<?php include "includes/header.php"; ?>
<?php isLoggedInRegular(); ?>
<?php checkPostPrivileges(); ?>
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
            <h4>Add Post</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item path__spacing"><a href="index.php"><i class="bi bi-house-door-fill"> &nbsp;</i></a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php">/ Profile &nbsp; </a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php?source=all_posts">/ Your Posts &nbsp; </a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="add-post.php<?php echo isset($_GET["p_id"]) ? $_GET["p_id"] : "" ?>">/ Edit a Post</a>
                </li>
            </ol>
            <div class="col-12 header__go-back-button">
                <a class="btn btn-primary mx-2" href="userprofile.php?source=all_posts" role="button"><i class="bi bi-skip-backward-fill"></i> &nbsp; Go Back</a>
            </div>

        </div>
        <?php editPostRegularInputs(); ?>
        <?php editPostRegular(); ?>

        <form action="" method="post" class="card add-post-user-spacing" enctype="multipart/form-data" novalidate>
            <div class="mb-3">
                <label for="validationTitle" class="form-label">Title</label>
                <input name="post_title" type="text" value="<?php echo $post_title; ?>" class="form-control <?php echo !empty($titleErr) ? "is-invalid" : "" ?>" id="validationTitle" placeholder="Enter your post title" required>
                <div class="invalid-feedback">
                    <?php echo $titleErr; ?>
                </div>
            </div>


            <div class="mb-3">
                <label for="validationCategory" class="form-label">Category</label>
                <select class="form-select <?php echo !empty($categoryErr) ? "is-invalid" : "" ?>" name="post_category" required aria-label="select example">
                    <?php getCurrentCategoryEdit(); ?>
                    <?php getNotCurrentCategoriesEdit(); ?>
                </select>
                <div class="invalid-feedback"><?php echo $categoryErr; ?></div>
            </div>

            <div class="mb-3">
                <label for="validationSelectStatus" class="form-label">Post Status</label>
                <select name="post_is_published" class="form-select <?php echo !empty($isPublishedErr) ? "is-invalid" : "" ?>" required aria-label="select example">
                    <?php echo $post_is_published ?
                        "<option value = '1'>Published</option>" .
                        "<option value = '0'>Draft</option>"
                        : "<option value = '0'>Draft</option>" .
                        "<option value = '1'>Published</option>" ?>
                </select>
                <div class="invalid-feedback"><?php echo $isPublishedErr; ?></div>
            </div>

            <div class="mb-3">
                
                <label for="validationPost" class="form-label">Post Image</label>
                <img width="128" class="edit-post-form__image" src="images/<?php echo $post_image ;?>" alt="image">
                
                <input name="post_image" value="<?php echo $post_image; ?>" type="file" class="form-control <?php echo !empty($imageErr) ? "is-invalid" : "" ?>" aria-label="file example" required>
                <div class="invalid-feedback"><?php echo $imageErr; ?></div>
            </div>

            <div class="mb-3">
                <label for="validationTags" class="form-label">Post Tags</label>
                <input name="post_tags" value="<?php echo $post_tags; ?>" type="text" class="form-control" id="validationTags" placeholder="Enter tags" required></textarea>
                <div class="invalid-feedback">
                    Please enter a tag.
                </div>
            </div>

            <div class="mb-3">
                <label for="validationContent" class="form-label">Content</label>
                <textarea name="post_content" class="form-control <?php echo !empty($contentErr) ? "is-invalid" : "" ?>" id="validationContent" placeholder="Enter description" required><?php echo $post_content; ?></textarea>
                <div class="invalid-feedback">
                    <?php echo $contentErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="edit-post">Edit Post</button>
            </div>

        </form>
    </div>


    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>