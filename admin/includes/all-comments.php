<?php //$sub_page = "all-posts"; ?>

<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>View All Comments</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="comments.php">Comments</a>
                </li>
                <li class="breadcrumb-item"><a href="comments.php">View All Comments</a>
                </li>

            </ol>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="main-header">
            <div class="col-12">

                <h4>Manage Comments</h4>
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
                <h5 class="card-header-text">Comments</h5>

            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table categories-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Post</th>
                                    <th>Content</th>
                                    <th>Approved</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Disapprove</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php getAllCommentsTable(); ?>
                                <?php deleteCommentFromTable() ;?>
                                <?php approveCommentAdmin() ;?>
                                <?php disapproveCommentAdmin() ;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>