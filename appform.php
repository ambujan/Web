<?php
include "connect.php";
$name = $_POST['Name'];
$mail = $_POST['email'];
$uname = $_POST['username'];
$password = md5($_POST['password']);
$hash = md5( rand(0,1000) );
$contact = $_POST['contact'];

$check = mysqli_query("SELECT * FROM user_register WHERE 'Username' = `$uname`");
if(mysqli_num_rows($check) > 0){
    echo "Username already exists!";
}

$check = mysqli_query("SELECT * FROM user_register WHERE 'mail' = `$email`");
if(mysqli_num_rows($check) > 0){
    echo "Account already exists! Continue to Login Page" ;
}

$sql= "INSERT INTO user_register (`Sr_no`, `Name`, `email`, `Username`, `Password`, `hash`, `Contact`) 
VALUES (NULL, '$name', '$mail', '$uname', '$password', '$hash', '$contact')";

if($link->query($sql) === TRUE){
    echo "<p>Info Registered!</p>";

    $to      = $mail; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject
    $message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$uname.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://localhost/Web/verify.php?email='.$mail.'&hash='.$hash.'

'; // Our message above including the link

    $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
}
else{
    echo "Error!";
}
$link->close();