<?php
session_start();
ini_set("display_errors",1);
require("config/config.php");
require("classes/class_curl.php");
$curl = new curl_json();
// Required field names
$required = array('logname', 'logpass');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  ?>
  <script>
  alert("All fields are Required");
  ?>
  </script>
  <?php
} else {
$data = array('Method' => 'Login', 'WebPassword' => md5(WEBUI_PASSWORD),
                                 'Name' => $_POST['logname'],
                                 'Password' => $_POST['logpass']);
$verified = $curl->perform_action($data);
//print_r($verified);
if($verified['Verified'] == "true")
{
$_SESSION['WEBUI_LOGGED'] = true;
$_SESSION['uuid'] = $verified['UUID'];
$_SESSION['FirstName'] = $verified['FirstName'];
$_SESSION['LastName'] = $verified['LastName'];
$_SESSION['Email'] = $verified['Email'];
$_SESSION['Data'] = $verified;
header("location: index.php?page=home");
}
}
?>