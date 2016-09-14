<?php
 $curl = new curl_json();
$data = array('Method' => 'GetUserMoney', 'WebPassword' => md5(WEBUI_PASSWORD),
                                 'user' => $_SESSION['uuid']);
                                 $verified = $curl->perform_action($data);
                                echo $verified['Amount'];
                                ?>