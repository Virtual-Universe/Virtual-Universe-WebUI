<?php    
require("config/config.php");
require("classes/class_curl.php");
require("includes/check.php");
include("includes/json.php");
require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
}
$errors = array();
$data = array();
$found = array();
$found[0] = json_encode(array('Method' => 'CheckIfUserExists', 'WebPassword' => md5(WEBUI_PASSWORD), 'Name' => $_POST[ACCFIRST].' '.$_POST[ACCLAST]));
$do_post_requested = do_post_request($found);
$recieved = json_decode($do_post_requested);
if ($recieved->{'Verified'} != false) { $errors['name'] = "This Username is already Taken"; }
if (!isValidEmail($_POST['email'])){ $errors['email'] = "Please Enter a Valid Email"; }
if(($_POST["pass"])!=($_POST["cpass"])) { $errors['pass'] = "Your Passwords dont match"; }
if ( ! empty($errors)) { $data['success'] = false; $data['errors']  = $errors; } else {
    
    		$passneu = $_POST[pass];
		$passwordHash = md5(md5($passneu) . ":");
     			$found = array();
			$found[0] = json_encode(array('Method' => 'CreateAccount', 'WebPassword' => md5(WEBUI_PASSWORD),
						'Name' => "$_POST[ACCFIRST] $_POST[ACCLAST]",
						'Email' => "$_POST[email]",
						'HomeRegion' => "",
						'PasswordHash' => $passneu,
						'PasswordSalt' => "$passwordSalt",
						'AvatarArchive' => $_POST['AvatarArchive'],
						'UserLevel' => "1",
						'RLName' => "",
						'RLAdress' => "",
						'RLCity' => "",
						'RLZip' => "",
						'RLCountry' => "",
						'RLDOB' => $_POST[tag] . "/" . $_POST[monat] . "/" . $_POST[jahr],
						'RLIP' => ""
						));
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = MAIL_SERVER;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = MAIL_USER;                 // SMTP username
$mail->Password = MAIL_PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->addAddress("$_POST[email]", "$_POST[ACCFIRST] $_POST[ACCLAST]"); 
			  $mail->Subject =  "Account Activation from " . TITLE;
				$body .= "Your account was successfully created at " . TITLE . ".\n";
				$body .= "Your first name: $_POST[ACCFIRST]\n";
				$body .= "Your last name:  $_POST[ACCLAST]\n";
				$body .= "Your password:  $_POST[pass]\n\n";
				$body .= "\n\n\n";
				$body .= "Thank you for using " . TITLE . "";
		    $mail->Body    =   $body;
			$send =	$mail->Send();		
						
			$do_post_requested = do_post_request($found);
			$recieved = json_decode($do_post_requested);
      if ($recieved->{'Verified'} == "true" && $send) {
     		$data['success'] = true;
		$data['message'] = 'Success!'; 
    }
    else
    {
         		$data['success'] = false;
		$data['message'] = 'Error!'; 
    }
    
	}
	echo json_encode($data);
?>