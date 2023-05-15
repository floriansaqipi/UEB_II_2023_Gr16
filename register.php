<?php include "includes/header.php"; ?>
<link href="css/register.css" rel="stylesheet">
<script src="js/register.js"></script>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include "includes/navabar.php"; ?>

        <!-- Navbar End -->


       
		<div class="container infinity-container">
		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>

			<!-- FORM BEGIN -->
			<div class="col-lg-12 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">

				<div style="margin-top:20px;" class="text-center mb-4">
					<h4>Create an account</h4>
				</div>
				<!-- Form -->
				<form id="myForm" action="register.php" method="POST" class="px-6" autocomplete="on">
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
						<div id="password-error" class="error-message"></div>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input id="confirm-password" type="password" name="confirm_password" placeholder="Confirm Password">
						<div id="confirm-password-error" class="error-message"></div>
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
					<div class="mb-3">
						<button value="Register" type="submit" class="btn btn-block">Register</button>
					</div>
					<div class="text-center mb-5" style="color: #777;">Already have an account? 
						<a class="login-link" href="login.html">Login here</a>
			       	</div>
				</form>
			</div>
			<!-- FORM END -->

			<div class="col-md-1 infinity-right-space"></div>
		</div>
	</div>
	

        
        <!-- Footer Start -->
        <?php include "includes/footer.php"; ?>