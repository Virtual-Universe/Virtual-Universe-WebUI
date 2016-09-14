<?php
define("TITLE","WhiteCoreWebUI");
define("WEBUI_SERVICE_URL","http://domain.com:8007/WEBUI");
define("WEBUI_TEXTURE_SERVICE","http://domain.com:8002");
define("WEBUI_MAP_SERVICE","http://domain.com:8012/MapService");
define("WEBUI_MAPAPI_SERVICE","http://domain.com:8012/MapAPI");
define("WEBUI_PASSWORD","webuipass");
define("DEFAULT_AVATAR", "Default_Female"); ///important for avatar slider to work, if the avatar archive name contains spaces it turns into _ so Male Avatar turns into Male_Avatar , this is used to set the "active" class on the slider all others are fetch automatically
################### GridMap Settings  #####################
// Allowing Zoom on your Map
$ALLOW_ZOOM = true;

// Zoom Level
// (1 => 4, 2 => 8, 3 => 16, 4 => 32, 5 => 64, 6 => 128, 7 => 256, 8 => 512
$zoomLevel = 5;
$zoomSize = 64;
$antiZoomSize = 64;

// Default StartPoint for Map
$mapstartX = 1000;
$mapstartY = 1000;

// Direction where Info Image has to stay 
// ex.: dr = down right ; dl =down left ; tr = top right ; tl = top left ; c = center
$display_marker="tr";
?>