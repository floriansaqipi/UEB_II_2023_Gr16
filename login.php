<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="css/register-login.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
    <?php

    ?>
	<div class="container infinity-container">
        <?php
        if (isset($_POST["login"])) {
          $email=$_POST["email"];
          $password=$_POST["password"];
          require_once "db.php";
          $sql="SELECT * FROM users WHERE email='$email'";
          $result=mysqli_query($conn,$sql);
          $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
          if($user){
            if (password_verify($password,$user["password"])) {
                session_start();
                $_SESSION["user"]="yes";
             
                header("Location:index.php"); //fajlli erzes user dashboard
              die();
            }else{
                echo "<div class='alert alert-danger'>Password does not match</div>";

            }
          }else{
            echo "<div class='alert alert-danger'>Email does not match</div>";
          }
        }
         ?>
		<div class="row">
			<div class="col-md-1 infinity-left-space"></div>
			
			<!-- FORM BEGIN -->
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center infinity-form">
				
				
				<div style="margin-top:20px;" class="text-center mb-4 ">
					<h4>Login into account</h4>
				</div>
				<!-- Form -->
				<form action="login.php" method="post" class="px-3">
					<!-- Input Box -->
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="email" name="" placeholder="Email Address" tabindex="10"required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" name="" placeholder="Password" required>
					</div>
					<div class="row mb-3">
						<!-- Remember Box -->
			            <div class="col-auto d-flex align-items-center">
			                <div class="custom-control custom-checkbox">
			                    <input type="checkbox" class="custom-control-input" id="cb1">
			                   	<label class="custom-control-label" for="cb1">Remember me</label>
			                </div>
				        </div>
			   	    </div>
			   	    <!-- Login Button -->
		            <div class="mb-3"> 
						<button type="submit" value="Login" class="btn btn-block">Login</button>
					</div>
					<div class="text-right ">
		                <a href="reset.html" class="forget-link">Forgot password?</a>
		            </div>
					<div class="text-center mb-2">
	                   	<div class="text-center mb-3" style="color: #777;">or login with</div>
		                   	
	                   	<!-- Facebook Button -->
	                   	<a href="" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>

                    	<!-- Google Button -->
						<a href="" class="btn btn-social btn-google"><i class="fa fa-google"></i></a>

						<!-- Twitter Button -->
						<a href="" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
					</div>
					<div class="text-center mb-5" style="color: #777;">Don't have an account? 
						<a class="register-link" href="register.html">Register here</a>
			       	</div>
				</form>
			</div>
			<!-- FORM END -->
	
			<div class="col-md-1 infinity-right-space"></div>
		</div>
	</div>
	

</body>
</html>
