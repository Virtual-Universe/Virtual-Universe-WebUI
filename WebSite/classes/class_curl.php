<?php
class curl_json
{
function perform_action($data)
{
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init(WEBUI_SERVICE_URL);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
curl_close($ch);
$new = json_decode($result,true);
return $new;
}
}
?>