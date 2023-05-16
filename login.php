<?php $page = "login"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navabar.php"; ?>

<div class="container infinity-container">
	

	<div class="row">
		<div class="col-md-1 infinity-left-space"></div>

		<!-- FORM BEGIN -->
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">

		<?php
		if (isset($_SESSION['status'])) {
			?>
			<div class="alert alert-success"><h5><?=$_SESSION['status'];?></h5></div>
			<?php
			unset($_SESSION['status']);
		} 
		?>
		
		
		

			<div style="margin-top:20px;" class="text-center mb-4 ">
				<h4>Login into account</h4>
			</div>
			<!-- Form -->
			<?php logInUser(); ?>
			<form action="" method="post" class="row g-3 " novalidate>
				
				<div class="col-md-12">
					<label for="validationServer03" class="form-label">Your Email</label>
					<input type="text" name="user_email" value="<?php echo $user_email; ?>" class="form-control <?php echo !empty($emailErr) ? "is-invalid" : "" ?>" id="validationServer03" aria-describedby="validationServer03Feedback" placeholder="Enter your Email" required>
					<div id="validationServer03Feedback" class="invalid-feedback">
						<?php echo $emailErr ;?>
					</div>
				</div>
				<div class="col-md-12">
					<label for="validationServer03" class="form-label">Your Password</label>
					<input type="password" name="user_password" value="<?php echo $user_password; ?>" class="form-control <?php echo !empty($passwordErr) ? "is-invalid" : "" ?>" id="validationServer03" aria-describedby="validationServer03Feedback" placeholder="Enter your Password" required>
					<div id="validationServer03Feedback" class="invalid-feedback">
					<?php echo $passwordErr ;?>
					</div>
				</div>
				
				<div class="col-12 ">
					<button name="login" class="btn btn-primary" type="submit">Submit form</button>
				</div>
				<div class="col-12 form-spacing">
					<span>Don't have an account? </span><a href="register.php">Register Here</a></span>
				</div>
			</form>
		</div>
		<!-- FORM END -->

		<div class="col-md-1 infinity-right-space"></div>
	</div>
</div>
<?php include "includes/footer.php"; ?>