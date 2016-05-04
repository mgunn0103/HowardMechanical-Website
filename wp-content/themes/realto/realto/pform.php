<?php
 // ++++++++++++++++++++++++++++++++++++
 /*
 Ajax Contact Form Version 2.0
 Copyright: Stuart Cochrane (stuartc1@gmail.com)
 URL: www.freecontactform.com
 Date: September 2009
 

 You must retain all comments, references and links
 
 */
 // ++++++++++++++++++++++++++++++++++++
error_reporting(0);
  
include 'cform_config.php';

$rnd = $_POST['rnd'];
$location = $_POST['location'];
$service = $_POST['service'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// This is in the PHP file and sends a Javascript alert to the client

if(!isset($rnd) || !isset($location) || !isset($service) || !isset($name) || !isset($phone) || !isset($email)) {
	echo $rnd;
	echo $location;
	echo $service;
	echo $name;
	echo $phone;
	echo $email;
	echo $error_message;
    //die();
}

	$email_from = $email;
	$email_subject = "Service Call: ".$service." in ".$location;
	$email_message = "A request for service has been submitted by '".stripslashes($name);
	$email_message .="' on ".date("d/m/Y")." at ".date("H:i")."\n\n";
	$email_message .="Call ".stripslashes($phone)." or email ".stripslashes($email)." to contact customer.";

	$headers = 'From: '.$email_from."\r\n" .
   'Reply-To: '.$email_from."\r\n" .
   'X-Mailer: PHP/' . phpversion();

	mail($email_it_to, $email_subject, $email_message, $headers);

	echo $confirmation;
	die();
?>