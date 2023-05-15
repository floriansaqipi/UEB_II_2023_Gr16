<div class="row">
    <div class="col-12 pad change-password-column">

    <a href="users.php?source=edit_user&sub_source=edit_user_password&user_id=<?php echo $_GET["user_id"] ;?>" role="button" class="btn btn-inverse-danger waves-effect waves-light">
        Change User Password
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
                <?php editUserAdminInputs(); ?>
                <?php editUserAdmin(); ?>
                <form action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="form-group row <?php echo !empty($usernameErr) || !empty($contentErr) || !empty($imageErr) ? "has-danger" : "" ?>">
                        <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">Username</label>
                        <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" value="<?php echo $username; ?>" id="example-text-input" placeholder="Enter your Username">
                            <div class="form-control-feedback"><?php echo $usernameErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Password</label>
                        <div class="col-sm-10">
                            <input name="user_password" class="form-control" type="password" value="<?php echo $user_password; ?>" id="author-input" placeholder="Enter Password">
                            <div class="form-control-feedback"><?php echo $passwordErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="user_confirm_password" class="form-control" type="password" value="<?php echo $user_confirm_password; ?>" id="author-input" placeholder="Confirm password">
                            <div class="form-control-feedback"><?php echo $confirmPasswordErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Firstname</label>
                        <div class="col-sm-10">
                            <input name="user_firstname" class="form-control" type="text" value="<?php echo $user_firstname; ?>" id="author-input" placeholder="Enter Firstname">
                            <div class="form-control-feedback"><?php echo $firstnameErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Lastname</label>
                        <div class="col-sm-10">
                            <input name="user_lastname" class="form-control" type="text" value="<?php echo $user_lastname; ?>" id="author-input" placeholder="Enter Lastname">
                            <div class="form-control-feedback"><?php echo $lastnameErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author-input" class="col-xs-2 col-form-label form-control-label">Email</label>
                        <div class="col-sm-10">
                            <input name="user_email" class="form-control" type="email" value="<?php echo $user_email; ?>" id="author-input" placeholder="Enter email">
                            <div class="form-control-feedback"><?php echo $emailErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($imageErr) ? "has-danger" : "" ?>">
                        <div class="col-sm-2">
                            <label for="file" class=" col-form-label form-control-label">Profile Image</label>
                        </div>
                        <div class="col-sm-10">
                            <img width="128"  src="../images/<?php echo $user_image ;?>" alt="image">
                            <label for="file" class="custom-file" style="width : 100%; margin-top: 16px">
                                <input name="user_image" type="file" id="file" class="custom-file-input">
                                <span class="custom-file-control" id="file-span">Choose file</span>
                            </label>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-10">
                            
                            <div class="form-control-feedback"><?php echo $imageErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row <?php echo !empty($coverImageErr) ? "has-danger" : "" ?>">
                        <div class="col-sm-2">
                            <label for="file" class=" col-form-label form-control-label">Cover Image</label>
                        </div>
                        <div class="col-sm-10">
                            <img width="128"  src="../images/<?php echo $user_cover_image ;?>" alt="image">
                            <label for="file" class="custom-file" style="width : 100%; margin-top: 16px">
                                <input name="user_cover_image" type="file" id="file" class="custom-file-input">
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
                        <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">User role</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="user_is_admin" id="exampleSelect1" >
                                <?php 
                                    echo $user_is_admin == 0 ? "<option value='0'>Regular</option>" : "<option value='1'>Admin</option>";   
                                ?>
                            </select>
                            <div class="form-control-feedback"><?php echo $isAdminErr; ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status-input" class="col-xs-2 col-form-label form-control-label">Bio</label>
                        <div class="col-sm-10">
                            <input name="user_bio" class="form-control" type="text" value="<?php echo $user_bio ?>" id="status-input" placeholder="Enter bio">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="content-input" class="col-xs-2 col-form-label form-control-label">About</label>
                        <div class="col-sm-10">
                            <textarea name="user_about" class="form-control" id="content-input" rows="4" placeholder="Enter something about you"><?php echo $user_about; ?></textarea>

                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="edit-user" class="btn btn-inverse-success waves-effect waves-light">edit user data</button>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>

</div>