<?php include "includes/header.php"; ?>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include "includes/navabar.php"; ?>

    <!-- Navbar End -->



    <div class="container-xxl bg-white p-5">

        <form class="was-validated">
            <div class="mb-3">
                <label for="validationTitle" class="form-label">Title</label>
                <input text class="form-control" id="validationTitle" placeholder="Enter your post title" required></textarea>
                <div class="invalid-feedback">
                    Please enter a title.
                </div>
            </div>


            <div class="mb-3">
                <label for="validationCategory" class="form-label">Category</label>
                <select class="form-select" required aria-label="select example">
                    <option value="1">One</option>
                </select>
                <div class="invalid-feedback">Example invalid select feedback</div>
            </div>

            <div class="mb-3">
                <label for="validationSelectStatus" class="form-label">Post Status</label>
                <select class="form-select" required aria-label="select example">
                    <option value="1">Draft</option>
                    <option value="1">Publish</option>
                </select>
                <div class="invalid-feedback">Example invalid select feedback</div>
            </div>

            <div class="mb-3">
                <label for="validationPost" class="form-label">Post Image</label>
                <input type="file" class="form-control" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>

            <div class="mb-3">
                <label for="validationTags" class="form-label">Post Tags</label>
                <input text class="form-control" id="validationTags" placeholder="Enter tags" required></textarea>
                <div class="invalid-feedback">
                    Please enter a tag.
                </div>
            </div>

            <div class="mb-3">
                <label for="validationContent" class="form-label">Content</label>
                <textarea class="form-control" id="validationContent" placeholder="Enter description" required></textarea>
                <div class="invalid-feedback">
                    Please enter a description
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Post</button>
            </div>

        </form>
    </div>


    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>