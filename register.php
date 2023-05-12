<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
    <?php
    if(isset($_POST["submit"])){
        $fullName=$_POST["fullname"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $passwordConfirm=$_POST["confirm_password"];
        $errors=array();
      //check if there is any empty values provided by the user by using if

        if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordConfirm)){
            array_push($errors,"All fields are required");
        }
        //chech if the email provided by the user is valid or not
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            array_push($errors,"Email is not valid");

        }
        //check password length
        if(strlen($password)<8){
            array_push($errors,"Password mus be at least 8 characters long");

        }
        //check if the password and password confrim are the same

        if($password !== $passwordConfirm){
            array_push($errors,"The password does noy match");
        }

        //if the array length is greater than 0 we havee errors and we can't register the datas
        
        if(count($errors)>0){
            foreach($errors as $error ){
                echo "<div class='alert alert-danger'>$error<>";
            }
        }else{
            //insert the data in database
        }
    }



    ?>
	<div class="container infinity-container">
		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>

			<!-- FORM BEGIN -->
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">
				<!-- Company Logo -->
				<div class="text-center mb-3 mt-5">
					<img src="logo.png" width="150px">
				</div>
				<div class="text-center mb-4">
					<h4>Create an account</h4>
				</div>
				<!-- Form -->
				<form action="register.php" method="post"  class="px-3">
					<!-- Input Box -->
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="fullname" placeholder="Full Name" tabindex="10"required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="email" name="email" placeholder="Email Address" tabindex="10"required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="password" placeholder="Password" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="confirm_password" placeholder="Confirm Password" required>
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

</body>
</html>
