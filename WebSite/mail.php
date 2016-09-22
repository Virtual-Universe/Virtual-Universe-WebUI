<pre><?php
ini_set("display_errors",1);
include 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->SMTPDebug = 3;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'k.meerts89@gmail.com';                 // SMTP username
$mail->Password = 'Destiny2013';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->addAddress("devil@secondgalaxy.com", "Devil Nexus"); 
			  $mail->Subject =  "Account Activation from " . TITLE;
				$body .= "Your account was successfully created at " . TITLE . ".\n";
				$body .= "Your first name: $_POST[ACCFIRST]\n";
				$body .= "Your last name:  $_POST[ACCLAST]\n";
				$body .= "Your password:  $_POST[pass]\n\n";
				$body .= "\n\n\n";
				$body .= "Thank you for using " . TITLE . "";
		    $mail->Body    =   $body;
		if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
			
?>