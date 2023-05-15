<?php //$sub_page = "all-posts"; ?>

<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>View All Users</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="users.php">Users</a>
                </li>
                <li class="breadcrumb-item"><a href="users.php">View All Users</a>
                </li>

            </ol>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="main-header">
            <div class="col-12">

                <h4>Manage Users</h4>
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
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Admin</th>
                                    <th>Make Admin</th>
                                    <th>Remove Admin</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php getAllUsersTable(); ?>
                                <?php deleteUserAdmin() ;?>
                                <?php changeUserToAdmin() ;?>
                                <?php changeUserToRegular() ;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>