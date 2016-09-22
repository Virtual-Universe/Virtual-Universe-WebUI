<pre>
<?php  
$errors         = array();
$data 			= array();
			$found = array();
		  $found[0] = json_encode(array('Method' => 'CheckIfUserExists', 'WebPassword' => md5(WEBUI_PASSWORD), 'Name' => $_POST[ACCFIRST].' '.$_POST[ACCLAST]));
  	$do_post_requested = do_post_request($found);
		$recieved = json_decode($do_post_requested);
		if ($recieved->{'Verified'} != false) {
$errors['name'] = "This Username is already Taken";
		} else {
    }
    	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);
  ?>              </pre>