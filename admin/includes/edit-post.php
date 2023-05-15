<?php $sub_page = "add-post"; ?>

<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Manage Your Posts</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="posts.php">Posts</a>
                </li>
                <li class="breadcrumb-item"><a href="posts.php?source=edit&p_id=<?php echo $_GET["p_id"] ;?>">Edit a post</a>
                </li>

            </ol>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="main-header">
            <div class="col-12">

                <h4>Edit your post</h4>
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
                <?php editPostAdminInputs(); ?>
                <?php editPostAdmin(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row <?php echo !empty($titleErr) || !empty($contentErr) || !empty($imageErr) ? "has-danger" : "" ?>">
                        <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Title</label>
                        <div class="col-sm-10">
                            <input name="post_title" class="form-control" type="text" value="<?php echo $post_title; ?>" id="example-text-input" placeholder="Enter your post title">
                            <div class="form-control-feedback"><?php echo $titleErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="post_category" id="exampleSelect1" >
                                <?php getCurrentCategoryEdit(); ?>
                                <?php getNotCurrentCategoriesEdit(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Author</label>
                        <div class="col-sm-10">
                            <input name="post_author" class="form-control" type="text" value="<?php echo $post_author; ?>" id="author-input" placeholder="Enter Author">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status-input" class="col-xs-2 col-form-label form-control-label">Post Status</label>
                        <div class="col-sm-10">
                            <input name="post_status" class="form-control" type="text" value="<?php echo $post_status; ?>" id="status-input" placeholder="Enter status">
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($imageErr) ? "has-danger" : "" ?>">
                        <div class="col-sm-2">
                            <label for="file" class=" col-form-label form-control-label">Post Image</label>
                        </div>
                        <div class="col-sm-10">
                            <img width="128"  src="../images/<?php echo $post_image ;?>" alt="image">
                            <label for="file" class="custom-file" style="width : 100%; margin-top: 16px">
                                <input name="post_image" type="file" id="file" class="custom-file-input">
                                <span class="custom-file-control" id="file-span">Choose file</span>
                            </label>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-10">
                            
                            <div class="form-control-feedback"><?php echo $imageErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags-input" class="col-xs-2 col-form-label form-control-label">Post Tags</label>
                        <div class="col-sm-10">
                            <input name="post_tags" class="form-control" type="text" value="<?php echo $post_tags; ?>" id="status-input" placeholder="Enter tags">
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
                            <button type="submit" name="edit-post" class="btn btn-inverse-success waves-effect waves-light">EDIT POST</button>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>

</div>