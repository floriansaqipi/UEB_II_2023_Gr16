<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="css/register-login.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</head>

<body>

<?php include "includes/header.php"; ?>

	<div class="container infinity-container">
		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>

			<!-- FORM BEGIN -->
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">

				<div style="margin-top:20px;" class="text-center mb-4">
					<h4>Create an account</h4>
				</div>
				<!-- Form -->
				<form action="register.php" method="POST" class="px-3" autocomplete="on">
					<!-- Input Box -->
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input class=" is-valid" type="text" name="firstName"  placeholder="First name" tabindex="10" required>
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input class="is-valid" type="text" name="lastName" placeholder="Last name" tabindex="10">
					</div>
					<div class="form-input input-group has-validation">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="username" class="form-control is-invalid" id="validationServerUsername" placeholder="Username" tabindex="10">
					</div>
					<div id="validationServerUsernameFeedback" class="invalid-feedback">
        					Please choose a username.
      				</div>
					<div class="form-input input-group has-validation">
						<span><i class="fa fa-envelope"> </i></span>
						<input type="email" name="email"class="form-control is-invalid" id="validationServerEmail" placeholder="Email Address" tabindex="10">
					</div>
					<div id="validationServerEmailFeedback" class="invalid-feedback">
        					Please choose a username.
      				</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="password" placeholder="Password">

					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="confirm_password" placeholder="Confirm Password">
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
				</form>
			</div>
			<!-- FORM END -->

			<div class="col-md-1 infinity-right-space"></div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
		integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>