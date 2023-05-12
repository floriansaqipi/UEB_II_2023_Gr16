<?php $sub_page = "add-post"; ?>

<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Add a Post</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="posts.php">Posts</a>
                </li>
                <li class="breadcrumb-item"><a href="posts.php?source=add_post">Add a post</a>
                </li>

            </ol>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="main-header">
            <div class="col-12">

                <h4>Share your thoughts</h4>
            </div>

        </div>
    </div>
</div>
<!-- Row end -->

<!-- Row start -->
<div class="row">
    <!-- Form Control starts -->
    <!-- Form Control ends -->

    <!-- Textual inputs starts -->

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Your Post</h5>

            </div>

            <!-- end of modal -->
            <div class="card-block">
                <?php
                global $titleErr, $imageErr, $contentErr;
                global $post_title, $post_image, $post_content;
                $titleErr = $imageErr = $contentErr = "";
                $post_title = $post_image = $post_content = "";
                $allowed_extensions = ["jpg", "png", "gid", "jpeg"];
                if (isset($_POST["add-post"])) {

                    $post_title = $_POST["post_title"];
                    $post_author = $_POST["post_author"];
                    $post_category_id = $_POST["post_category_id"];
                    $post_status = $_POST["post_status"];
                    $post_image = $_FILES["post_image"]["name"];
                    $post_image_temp = $_FILES["post_image"]["tmp_name"];
                    $post_image_size = $_FILES["post_image"]["size"];
                    $post_tags = $_POST["post_tags"];
                    $post_content = $_POST["post_content"];
                    $post_date = date('d-m-y');
                    $post_comment_count = 4;

                    if (empty($post_title)) {
                        $titleErr = "Title can not be empty";
                    } else {
                        $pattern = "/.{3,}/";
                        if (!preg_match($pattern, trim($post_title))) {
                            $titleErr = "Title must be longer than 3 characters";
                        }
                    }

                    if (empty($post_content)) {
                        $contentErr = "Title can not be empty";
                    } else {
                        $pattern = "/.{3,}/";
                        if (!preg_match($pattern, trim($post_content))) {
                            $contentErr = "Title must be longer than 3 characters";
                        }
                    }

                    if (file_exists($post_image_temp)) {
                        $file_extension = pathinfo($post_image, PATHINFO_EXTENSION);
                        
                        if (!in_array($file_extension, $allowed_extensions)) {
                            $imageErr = "Image can only be of type jpg/jpeg/png/gif";
                        } else if ($post_image_size > 3000000) {
                            $imageErr = "Image can't be over 3MB";
                        } else {

                            move_uploaded_file($post_image_temp, "../images/$post_image");
                            header("Location: posts.php");
                        }
                    }
                    
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row <?php echo !empty($titleErr) ? "has-danger" : "" ?>">
                        <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Title</label>
                        <div class="col-sm-10">
                            <input name="post_title" class="form-control" type="text" value="<?php echo $post_title; ?>" id="example-text-input" placeholder="Enter your post title">
                            <div class="form-control-feedback"><?php echo $titleErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-xs-2 col-form-label form-control-label">Post Category Id</label>
                        <div class="col-sm-10">
                            <input name="post_category_id" class="form-control" type="text" value="" id="example-search-input" placeholder="Enter Category">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Author</label>
                        <div class="col-sm-10">
                            <input name="post_author" class="form-control" type="text" value="" id="author-input" placeholder="Enter Author">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status-input" class="col-xs-2 col-form-label form-control-label">Post Status</label>
                        <div class="col-sm-10">
                            <input name="post_status" class="form-control" type="text" value="" id="status-input" placeholder="Enter status">
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($imageErr) ? "has-danger" : "" ?>">
                        <div class="col-sm-2">
                            <label for="file" class=" col-form-label form-control-label">Post Image</label>
                        </div>
                        <div class="col-sm-10">
                            <label for="file" class="custom-file" style="width : 100%;">
                                <input name="post_image" type="file" id="file" class="custom-file-input">
                                <span class="custom-file-control" id="file-span">Choose file</span>
                            </label>
                        </div>
                        <div class="col-sm-10">
                            
                            <div class="form-control-feedback"><?php echo $imageErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags-input" class="col-xs-2 col-form-label form-control-label">Post Tags</label>
                        <div class="col-sm-10">
                            <input name="post_tags" class="form-control" type="text" value="" id="status-input" placeholder="Enter tags">
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($contentErr) ? "has-danger" : "" ?>">
                        <label for="content-input" class="col-xs-2 col-form-label form-control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea name="post_content" class="form-control" id="content-input" rows="4" placeholder="Enter description"><?php echo $post_content; ?></textarea>
                            <div class="form-control-feedback"><?php echo $contentErr; ?></div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="add-post" class="btn btn-inverse-success waves-effect waves-light">POST</button>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>

</div>