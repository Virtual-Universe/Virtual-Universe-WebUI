<?php
session_start();
 require("config/config.php");
require("classes/class_curl.php");
require("classes/class_mysqli.php");
 $curl = new curl_json();
$data = array('Method' => 'GiveUserMoney', 'WebPassword' => md5(WEBUI_PASSWORD),
                                 'user' => $_SESSION['uuid'],'amount' => "$_POST[amount]");
                                 $verified = $curl->perform_action($data);
                               print_r($verified);
                                ?>