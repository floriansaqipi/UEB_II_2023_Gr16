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



    <div class="container-xxl bg-white p-5">
        <div class="main-header" style="margin-top: 0px;">
            <h4>Change Password</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item path__spacing"><a href="index.php"><i class="bi bi-house-door-fill"> &nbsp;</i></a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php">/ Profile &nbsp; </a>
                </li>
                <li class="breadcrumb-item path__spacing"><a href="userprofile.php?source=all_posts">/ Change Your Password &nbsp; </a>
                </li>
            </ol>
            <div class="col-12 header__go-back-button">
                <a class="btn btn-primary mx-2" href="userprofile.php?source=all_posts" role="button"><i class="bi bi-skip-backward-fill"></i> &nbsp; Go Back</a>
            </div>

        </div>

        <?php editUserPasswordRegular(); ?>

        <form action="" method="post" class="row g-3 card-body edit-password__form" novalidate>
            <div class="col-md-4">
                <label for="validationServer01" class="form-label">Old password</label>
                <input name="user_old_password" type="password" class="form-control <?php echo !empty($oldPasswordErr) ? "is-invalid" : ""; ?>" id="validationServer01" value="<?php echo $user_old_password; ?>" placeholder="Enter your old password" required>
                <div class="invalid-feedback">
                    <?php echo $oldPasswordErr; ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationServer01" class="form-label">New password</label>
                <input name="user_password" type="password" class="form-control <?php echo !empty($passwordErr) ? "is-invalid" : ""; ?>" id="validationServer01" value="<?php echo $user_password; ?>" placeholder="Enter your new password" required>
                <div class="invalid-feedback">
                <?php echo $passwordErr; ?>

                </div>
            </div>
            <div class="col-md-4">
                <label for="validationServer01" class="form-label">Confirm password</label>
                <input name="user_confirm_password" type="password" class="form-control <?php echo !empty($confirmPasswordErr) ? "is-invalid" : ""; ?>" id="validationServer01" value="<?php echo $user_confirm_password; ?>" placeholder="Enter your new password" required>
                <div class="invalid-feedback">
                <?php echo $confirmPasswordErr; ?>

                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="edit-user-password">Change Password</button>
            </div>
        </form>
    </div>


    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>