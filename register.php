
<?php $page = "register"; ?>
<?php include 'includes/header.php'; ?>


<?php include "includes/navabar.php"; ?>
<link href="css/register.css" rel="stylesheet">
<!-- <script src="js/register.js"></script> -->

    

       

       
		<div style="background-image:url('bg.png');"  class="container infinity-container">
		<div class="alert text-success">
				<?php
				if (isset($_SESSION['status'])) {
					echo "<h4>".$_SESSION['status']."</h4>";
					unset($_SESSION['status']);
				}

				
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
				<form id="myForm" action="register-code.php" method="POST" class="px-6" autocomplete="on">
					<!-- Input Box -->
					<div class="form-input ">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="firstName"  placeholder="First name" tabindex="10" >
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input  type="text" name="lastName"  placeholder="Last name" tabindex="10" >
					</div>
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="username"  placeholder="Username" tabindex="10" >
					</div>
				
					<div class="form-input">
						<span><i class="fa fa-envelope"> </i></span>
						<input type="email" name="email" placeholder="Email Address" tabindex="10">
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input id="password" type="password" name="password" placeholder="Password">
						<!-- <div id="password-error" class="error-message"></div> -->
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input id="confirm-password" type="password" name="confirm_password" placeholder="Confirm Password">
						<!-- <div id="confirm-password-error" class="error-message"></div> -->
					</div>

					<div class="form-input">
						<span><i class="fa fa-image"></i></span>
						<input type="file" name="image">
					</div>

					<div class="form-input">
						<label for="useradmin">Choose the way you want to sign up</label>
						<select name="useradmin" id="useradmin">
							<option value="admin">Admin</option>
							<option value="regular">Regular</option>
						</select>
					</div>




					<!-- Register Button -->
					<div class="col-12 ">
					<button name="register" class="btn btn-primary" type="submit">Submit form</button>
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
	

        
        <!-- Footer Start -->
        <?php include "includes/footer.php"; ?>