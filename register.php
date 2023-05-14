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


	<div class="container infinity-container">

	<?php
//Kontrollo nese butoni submit eshte klikuar
if(isset($_POST['submit'])){
    //Ruaj te dhenat e formes ne nje varg
    $name = $_POST['firstName'];
    $surname = $_POST['lastName'];
	$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //Kontrollo validitetin e email-it
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email-i nuk është valid.<br>";
    }
    else{
        //Kontrollo nëse email-i është përdorur më parë
        //Kodi për kontrollin e email-it do të variojë në varësi të strukturës së databazës
        if(emailExists($email)){
            echo "Ky email është i përdorur më parë.<br>";
        }
        else{
            //Kontrollo gjatësinë e password-it
            if(strlen($password) < 8){
                echo "Password-i duhet të jetë më i gjatë se 8 karaktere.<br>";
            }
            else{
                //Kontrollo nëse password-i dhe konfirmimi i password-it janë të njëjtë
                if($password != $confirm_password){
                    echo "Password-et nuk janë të njëjta.<br>";
                }
                else{
                    //Regjistro perdoruesin ne databaze ose ne sistemin tjeter
                    registerUser($username,$name, $surname, $email, $password);
                    echo "Regjistrimi u krye me sukses.<br>";
                }
            }
        }
    }
}



//Funksioni për të kontrolluar nëse email-i është përdorur më parë
function emailExists($email){
    //Kodi për kontrollin e email-it do të variojë në varësi të strukturës së databazës
    //Kodi duhet të kthejë true nëse email-i është i përdorur më parë dhe false nëse nuk është i përdorur
    return false;
}
function registerUser($username,$name, $surname, $email, $password){

   include "db.php";
   $sql = "SELECT * FROM users WHERE email='$email'";
   $result = $connection->query($sql);
   if ($result->num_rows > 0) {
	   echo "Ky email është i përdorur më parë.<br>";
   }   else {
	//Krijo një fjalëkalim të hash-uar
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	//Inserto të dhënat e perdoruesit në tabelën users
	$sql = "INSERT INTO users (username,, firstname, lastname,password, email, image) 
			VALUES ('$username', '$name', '$surname', '$email', '$hashed_password', 'default.png')";
	if ($connecction->query($sql) === TRUE) {
		echo "Regjistrimi u krye me sukses.<br>";
	} else {
		echo "Gabim gjatë regjistrimit: ";
	}
}
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
				<form action="register.php" method="POST" class="px-6" autocomplete="on">
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