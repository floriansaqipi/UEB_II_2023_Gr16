<?php $sub_page = "edit-user"; ?>

<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Manage User Account</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="users.php">Users</a>
                </li>
                <li class="breadcrumb-item"><a href="users.php?source=edit_user&user_id=<?php echo $_GET["user_id"] ;?>">Edit User Data</a>
                </li>

            </ol>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="main-header">
            <div class="col-12">

                <h4>Edit User Data</h4>
            </div>

            
        </div>
    </div>
</div>
<!-- Row end -->
<?php 
    $sub_source = isset($_GET["sub_source"]) ? $_GET["sub_source"] : "";

    switch($sub_source){
        case "edit_user_password";
    echo "this shit";

            include "includes/edit-user-password.php";
            break;
        default;
            include "includes/edit-user-data.php";
        break;
    }
?>


