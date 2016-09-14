<?php
$data = array('Method' => 'SendObject', 'WebPassword' => md5(WEBUI_PASSWORD),'user'=>'123','object'=>'1234');
 $curl = new curl_json();
   $recieved = $curl->perform_action($data);
   print_r($recieved);