<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];
$numuber = $_POST['mobile'];

$to = "kaushikakasun@gmail.com";

$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message ."/r/n Mobile number =".$numuber;

$headers = "From: noreply@codeconia.com" . "\r\n" .
"CC: somebodyelse@example.yoursitecom";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");
?>