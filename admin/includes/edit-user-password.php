<div class="row">
    <div class="col-12 pad change-password-column">

    <a href="users.php?source=edit_user&user_id=<?php echo $_GET["user_id"] ;?>" role="button" class="btn btn-inverse-danger waves-effect waves-light">
        GO BACK
    </a>
    </div>

<!-- Row start -->
<div class="row">
    <!-- Form Control starts -->
    <!-- Form Control ends -->

    <!-- Textual inputs starts -->

    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">User</h5>

            </div>

            <!-- end of modal -->
            <div class="card-block">
                <?php editUserPasswordAdminInputs(); ?>
                <?php editUserPasswordAdmin(); ?>
                <form action="" method="post" novalidate>
                    
                    <div class="form-group row <?php echo !empty($oldPasswordErr) ?  "has-danger" : "" ;?> ">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Old Password</label>
                        <div class="col-sm-10">
                            <input name="user_old_password" class="form-control" type="password" value="<?php echo $user_old_password; ?>" id="author-input" placeholder="Enter old Password">
                            <div class="form-control-feedback"><?php echo $oldPasswordErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($passwordErr) ? "has-danger" : ""; ?>">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Password</label>
                        <div class="col-sm-10">
                            <input name="user_password" class="form-control" type="password" value="<?php echo $user_password; ?>" id="author-input" placeholder="Enter Password">
                            <div class="form-control-feedback"><?php echo $passwordErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($confirmPasswordErr) ? "has-danger" : ""; ?>">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="user_confirm_password" class="form-control" type="password" value="<?php echo $user_confirm_password; ?>" id="author-input" placeholder="Confirm password">
                            <div class="form-control-feedback"><?php echo $confirmPasswordErr; ?></div>
                        </div>
                    </div>
                   
                    
                   
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="edit-user-password" class="btn btn-inverse-success waves-effect waves-light">Change User Password</button>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>

</div>