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
   
<?php
	
	// include ('db.php');
	// 	$error=0;
		
	// if ($error==0) {
	// 	if(isset($_REQUEST['submit'])){
	// 		$fullName=$_REQUEST['fullName'];
	// 		$email=$_REQUEST['email'];
	// 		$password=$_REQUEST['password'];
	// 		$confirm_password=$_REQUEST['confirm_password'];

			
	
	// 		if (empty($fullName)) {
	// 			$fullName_error="Please enter the full name";
	// 			$error=1;
	// 		} elseif(!preg_match("/^[a-zA-Z ]*$/",$fullName)){
	// 			$fullName_error="Only letters are allowed";
	// 			$error=1;

	// 		}
			

	// 		if (empty($email)) {
	// 			$email_error="Please enter your email";
	// 			$error=1;
	// 		}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	// 			$email_error="Invalid Email Format";
	// 			$error=1;
	// 		}

	// 		if (empty($password)) {
	// 			$email_error="Please enter a password";
	// 			$error=1;
	// 		}
	// 		if($password !== $passwordConfirm){
	// 			 $match="The password doesn't match";
	// 			 $error=1;
	// 		}
			
		

	
	// 		$insert_query=mysqli_query($connection,"insert into //tbl_user set fullname='$fullName',email='$email',password='$password',confirm_password='confirm_password'");
	// 		if ($insert_query) {
	// 			$msg="Registration successfull";
			
	// 		}else {
	// 			$msg="Error";
	// 		}
	// 	}
	// else{
	// 	$msg="Please fill all the fields";
	// }
	
	// }
	// function validPW($password){
	// 	if (strlen($password)>=8) {
	// 		if(!ctype_upper($password)&& !ctype_lower($password)){
	// 		return TRUE;
	// 		}
	// 	}

	// }



    ?>
	<div class="container infinity-container">

	<?php
	
	if (isset($_POST["submit"])) {
		require_once "db.php";
	
		$fullName = trim($_POST["fullName"]);
		$email = trim($_POST["email"]);
		$password = trim($_POST["password"]);
		$passwordConfirm = trim($_POST["confirm_password"]);
	
		$errors = array();
	
		// Check if all fields are provided
		if (empty($fullName) || empty($email) || empty($password) || empty($passwordConfirm)) {
			array_push($errors, "All fields are required");
		}
	
		// Check if the email provided by the user is valid
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors, "Email is not valid");
		}
	
		// Check password length
		if (strlen($password) < 8) {
			array_push($errors, "Password must be at least 8 characters long");
		}
	
		// Check if the password and password confirm are the same
		if ($password !== $passwordConfirm) {
			array_push($errors, "The password does not match");
		}
	
		// Check if email already exists
		$sql = "SELECT * from users WHERE email=?";
		$stmt = mysqli_stmt_init($conn);
		if (mysqli_stmt_prepare($stmt, $sql)) {
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if (mysqli_num_rows($result) > 0) {
				array_push($errors, "Email already exists");
			}
		} else {
			die("Something went wrong");
		}
	
		if (count($errors) > 0) {
			// Display errors
			foreach ($errors as $error) {
				echo "<div class='alert alert-danger'>$error</div>";
			}
		} else {
			// Insert the data in database
			$passwordHash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)) {
				mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
				mysqli_stmt_execute($stmt);
				echo "<div class='alert alert-success'>You are registered successfully.</div>";
			} else {
				die("Something went wrong");
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	?>

		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>

			<!-- FORM BEGIN -->
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">
				
				<div style="margin-top:20px;" class="text-center mb-4">
					<h4>Create an account</h4>
				</div>
				<!-- Form -->
				<form action="register.php" method="POST"  class="px-3" autocomplete="on">
					<!-- Input Box -->
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="fullName" placeholder="Full Name" tabindex="10">
						<!-- <span class="alert alert-danger??"<?php if(!empty($fullName_error)){ echo $fullName_error;}?></span> -->
					</div>
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="email" name="email" placeholder="Email Address" tabindex="10">
						<!-- <span class="alert alert-danger??"<?php if(!empty($email_error)){ echo $email_error;}?></span> -->

					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="password" placeholder="Password" >
						<!-- <span class="alert alert-danger??"<?php if(!empty($password_error)){ echo $password_error;}?></span> -->
						
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="confirm_password" placeholder="Confirm Password">
						<!-- <span class="alert alert-danger??"<?php if(!empty($match)){ echo $match;}?></span> -->
						


					</div>
					<!-- Register Button -->
		            <div class="mb-3"> 
						<button value="Register" type="submit" class="btn btn-block">Register</button>
					</div>
					<div class="text-center mb-2">
	                   	<div class="text-center mb-3" style="color: #777;">or register with</div>
		                   	
	                   	<!-- Facebook Button -->
	                   	<a href="" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>

                    	<!-- Google Button -->
						<a href="" class="btn btn-social btn-google"><i class="fa fa-google"></i></a>

						<!-- Twitter Button -->
						<a href="" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
