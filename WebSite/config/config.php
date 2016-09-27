<?php

define("TITLE","Virtual Universe");
define("HTML_TITLE","<font color='#00CCFF'>Virtual</font><font color='#858585'>Universe</font>");
define("WEBUI_SERVICE_URL","https://your-domain-here:81/WEBUI");
define("WEBUI_TEXTURE_SERVICE","https://your-domain-here:81");
define("WEBUI_MAP_SERVICE","https://your-domain-here:81/MapService");
define("WEBUI_MAPAPI_SERVICE","https://your-domain-here:81/MapAPI");
define("WEBUI_PASSWORD","xxxx");
define("DEFAULT_AVATAR", "Ruth"); ///important for avatar slider to work, if the avatar archive name contains spaces it turns into _ so Male Avatar turns into Male_Avatar , this is used to set the "active" class on the slider all others are fetch automatically
define("MAIL_SERVER","");
define("MAIL_USER","");
define("MAIL_PASS","");
$ALLOW_ZOOM = true;
$zoomLevel = 5;
$zoomSize = 64;
$antiZoomSize = 64;
$mapstartX = 1000;
$mapstartY = 1000;
$display_marker="tr";

$mysql = mysql_connect("localhost","root","xxxx") or 
die(mysql_error()); 
if($mysql) 
{
	 mysql_select_db("universe",$mysql);
} 
define("CURRENCY","BaseCurrency"); ///BaseCurrency 
;define("CURRENCY","AdvancedCurrency"); // AdvancedCurrency is not fully implemented at the moment 
?>
