<?php

 $curl = new curl_json();
$data = array('Method' => 'AddUserMoney', 'WebPassword' => md5(WEBUI_PASSWORD),
                                 'user' => $_SESSION['uuid'],'amount' => "200");
                                 $verified = $curl->perform_action($data);
                               print_r($verified);
                                ?>