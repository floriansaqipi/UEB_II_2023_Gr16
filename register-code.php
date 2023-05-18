<?php

session_start();
include ('includes/db.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader


function sendemail_verify($firstName,$email,$verify_token){
    
    $mail = new PHPMailer(true);
   // $mail->SMTPDebug = 2;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'erezamerovci@gmail.com';                     //SMTP username
    $mail->Password   = 'vmugsqvwfaqhggry';                               //SMTP password
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('erezamerovci@gmail.com', $firstName);
    $mail->addAddress($email);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification from Jobfinder';

    $email_template="
    <h2>You have been registered to Jobfinder</h2>
    <h5>Verify your email address to Login with the below given link</h5>
    <br><br>
    <a href='localhost/xampp/projekti_ueb_2/verify-email.php?token=$verify_token'>Click me</a>
    ";
    $mail->Body=$email_template;
    $mail->send();
    // echo 'Message has been sent';

}
global $connection;
global $firstName, $lastName,$username,$email,$password,$confirm_password,$image,$useradmin;
if(isset($_POST['register'])){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
	$email =$_POST["email"];
	$password = $_POST["password"];
	$confirm_password =$_POST["confirm_password"];
    $image=$_POST['image'];
    $useradmin=$_POST['useradmin'];
    $verify_token=md5(rand());

    $firstName = mysqli_real_escape_string($connection, $firstName);
    $lastName = mysqli_real_escape_string($connection, $lastName);
    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $confirm_password = mysqli_real_escape_string($connection, $confirm_password);
    $image = mysqli_real_escape_string($connection, $image);
    $useradmin = mysqli_real_escape_string($connection, $useradmin);

    
   

// FirstName validation
if(empty($firstName)) {
    $_SESSION['error'] = "Please write your first name";
    header('Location: register.php');
    exit();
} else {
    $firstName = $_POST['firstName'];
    if(!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        $_SESSION['error'] = "First name can only contain letters and spaces.";
        header('Location: register.php');
        exit();
    }
}

//Last name validation
if(empty($lastName)) {
    $_SESSION['error'] = "Please write your last name";
    header('Location: register.php');
    exit();
} else {
    $lastName = $_POST['lastName'];
    if(!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        $_SESSION['error'] = "Last name can only contain letters and spaces.";
        header('Location: register.php');
        exit();
    }
}

//User name validation
if(empty($_POST['username'])) {
    $_SESSION['error'] = "Please write a username";
    header('Location: register.php');
    exit();
} else {
    $username =$_POST['username'];
   
}

$image_temp = $_FILES["image"]["tmp_name"];
$image_size = $_FILES["image"]["size"];

if (file_exists($image_temp)) {
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extensions)) {
        $imageErr = "Image can only be of type jpg/jpeg/png/gif";
    } else if ($image_size > 3000000) {
        $imageErr = "Image can't be over 3MB";
    } else {

        move_uploaded_file($image_temp, "../images/$image");
    }
}


// check if password and confirm password match
if ($_POST['password'] != $_POST['confirm_password']) {
    $_SESSION['status'] = "Password and confirm password do not match.";
    header("Location: register.php");
    exit();
}

// check if password is at least 8 characters long
if (strlen($_POST['password']) < 8) {
    $_SESSION['status'] = "Password must be at least 8 characters long.";
    header("Location: register.php");
    exit();
}

$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);







    // sendemail_verify("$firstName","$email","$verify_token");
    // echo "sent or not?";
    //Email excists or not
    $check_email_query="SELECT email from users where email='$email' limit 1";
    $check_email_query_run=mysqli_query($connection, $check_email_query);

if (mysqli_num_rows($check_email_query_run)>0) {
    $_SESSION['status']="This email already excists";
    header("Location:");
} else {
    //Insert user/Registered User Data
    $query="INSERT INTO users(username,password,firstname,lastname,email,image,verify_token) VALUES('$username','$hashed_password','$firstName','$lastName','$email','$image','$verify_token')";
    $query_run=mysqli_query($connection,$query);

    if ($query_run) {
        sendemail_verify("$firstName","$email","$verify_token");
        $_SESSION['status']="Registration successfull!Please verify your email address.";
    } else {
        $_SESSION['status']="Registration failed!";
        header("Location:register.php");

    }
    
}


header("Location: register.php");

}



?>

