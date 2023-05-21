
<? session_start(); ?>
<?php $page = "register"; ?>
<?php include 'includes/header.php'; ?>


<?php include "includes/navabar.php"; ?>
<link href="css/register.css" rel="stylesheet">
<link href="css/added.css" rel="stylesheet">
<link href="css/extra.css"rel="stylesheet">
<!-- <script src="js/register.js"></script> -->

    

       

				<?php userSignUp(); ?>
       
		<div style="background-image:url('bg.png');"  class="container infinity-container">
		<div class="alert">
				<?php
				
					echo "<h4>". $confirmation."</h4>";
					
				

				
				?>
			</div>
		
		<div class="row">
			<div  class="col-md-1 infinity-left-space"></div>

			<!-- FORM BEGIN -->
			<div  class="col-lg-12 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">

				<div style="margin-top:20px;" class="text-center mb-4">
					<h4>Create an account</h4>
				</div>
				<!-- Form -->
				<form id="myForm" action="" method="post" class="px-6"  enctype="multipart/form-data" novalidate>
					<!-- Input Box -->
					<div class="form-input ">
						<span><i class="fa fa-user"></i></span>
						<input class="<?php echo !empty($firstnameErr) ? "is-invalid-sign-up" : "" ?>" type="text" name="user_firstname" value="<?php echo $user_firstname; ?>"  placeholder="First name" tabindex="10" >	
						<div class="invalid-feedback">
							<?php echo $firstnameErr ; ?>
						</div>
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input class="<?php echo !empty($lastnameErr) ? "is-invalid-sign-up" : "" ?>" type="text" name="user_lastname" value="<?php echo $user_lastname; ?>"  placeholder="Last name" tabindex="10" >
						<div class="invalid-feedback">
							<?php echo $lastnameErr ; ?>
						</div>
					</div>
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input class="<?php echo !empty($usernameErr) ? "is-invalid-sign-up" : "" ?>" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" tabindex="10" >
						<div class="invalid-feedback">
							<?php echo $usernameErr ; ?>
							
						</div>
					</div>
				
					<div class="form-input">
						<span><i class="fa fa-envelope"> </i></span>
						<input class="<?php echo !empty($emailErr) ? "is-invalid-sign-up" : "" ?>" type="email" name="user_email" value="<?php echo $user_email; ?>" placeholder="Email Address" tabindex="10">
						<div class="invalid-feedback">
						<?php echo $emailErr ; ?>
							
						</div>
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input class="<?php echo !empty($passwordErr) ? "is-invalid-sign-up" : "" ?>" id="password" type="password" name="user_password" value="<?php echo $user_password; ?>" placeholder="Password">
						<div class="invalid-feedback">
						<?php echo $passwordErr ; ?>
							
						</div>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input class="<?php echo !empty($confirmPasswordErr) ? "is-invalid-sign-up" : "" ?>" id="confirm-password" type="password" name="user_confirm_password" value="<?php echo $user_confirm_password; ?>" placeholder="Confirm Password">
						<div class="invalid-feedback">
						<?php echo $confirmPasswordErr ; ?>
							
						</div>
					</div>

					<div class="form-input">
						<span><i class="fa fa-image"></i></span>
						<input class="<?php echo !empty($imageErr) ? "is-invalid-sign-up" : "" ?>" type="file" name="user_image" accept="image/png,image/jpeg">
						<div class="invalid-feedback">
						<?php echo $imageErr ; ?>
							
						</div>
					</div>

					<div class="form-input">
						<label for="useradmin">Choose the way you want to sign up</label>
						<select class="<?php !empty($isAdminErr) ? "is-invalid-sign-up" : "" ?>" name="user_is_admin" id="useradmin">
							<option value="1">Admin</option>
							<option value="0">Regular</option>
						</select>
						<div class="invalid-feedback">
						<?php echo $isAdminErr ; ?>
							
						</div>
					</div>




					<!-- Register Button -->
					<div class="col-12 ">
					<button name="user_register" class="btn btn-primary" type="submit">Submit form</button>
				</div>
					<div class="text-center mb-5" style="color: #777;">Already have an account? 
						<a class="login-link" href="login.php">Login here</a>
			       	</div>
				</form>
			</div>
			<!-- FORM END -->
			

			<div class="col-md-1 infinity-right-space"></div>
		</div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <!-- Footer Start -->
        <?php include "includes/footer.php"; ?>