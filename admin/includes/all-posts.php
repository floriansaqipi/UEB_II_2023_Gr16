<?php $sub_page = "all-posts"; ?>

<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>View All Posts</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="all-posts.php">Posts</a>
                </li>
                <li class="breadcrumb-item"><a href="all-posts.php">View All Posts</a>
                </li>

            </ol>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="main-header">
            <div class="col-12">

                <h4>Share your thoughts</h4>
            </div>
            <div class="col-12 pad">


                <a class="btn btn-inverse-info waves-effect waves-light" href="posts.php?source=add_post" role="button">Add a Post</a>

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
                <h5 class="card-header-text">Categories</h5>

            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table categories-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM posts ";
                                $select_posts = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_posts)) {
                                    $post_id = $row["post_id"];
                                    $post_author = $row["author"];
                                    $post_title = $row["title"];
                                    $post_category_id = $row["category_id"];
                                    $post_status = $row["status"];
                                    $post_image = $row["image"];
                                    $post_tags = $row["tags"];
                                    $post_comment_count = $row["comment_count"];
                                    $post_date = $row["date"];

                                    echo "<tr>";
                                    echo "<td> $post_id </td>";
                                    echo "<td>$post_author </td>";
                                    echo "<td>$post_title </td>";
                                    echo "<td>$post_category_id </td>";
                                    echo "<td>$post_status </td>";
                                    echo "<td><img width=100 class='img-responsive' src='../images/$post_image' alt = 'image'></td>";
                                    echo "<td>$post_tags </td>";
                                    echo "<td>$post_comment_count </td>";
                                    echo "<td>$post_date</td>";
                                    echo "</tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>