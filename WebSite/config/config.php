<?php

define("TITLE","VirtualNexus");
define("HTML_TITLE","<font color='#00CCFF'>Virtual</font><font color='#858585'>Nexus</font>");
define("WEBUI_SERVICE_URL","https://virtualnexus.eu:81/WEBUI");
define("WEBUI_TEXTURE_SERVICE","https://virtualnexus.eu:81");
define("WEBUI_MAP_SERVICE","https://virtualnexus.eu:81/MapService");
define("WEBUI_MAPAPI_SERVICE","https://virtualnexus.eu:81/MapAPI");
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

$mysql = mysql_connect("localhost","root","xxxx") or die(mysql_error());
if($mysql)
{
mysql_select_db("white",$mysql);
}
define("CURRENCY","BaseCurrency"); ///BaseCurrency or AdvancedCurrency ///not used at the moment
?>
