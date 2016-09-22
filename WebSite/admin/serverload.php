<?php
function get_server_load($windows = 0)
{
    $os = strtolower(PHP_OS);
    if (strpos($os, "win") === false)
    {
        if (file_exists("/proc/loadavg"))
        {
            $load = file_get_contents("/proc/loadavg");
            $load = explode(' ', $load);
            return $load;
        }
        elseif (function_exists("shell_exec"))
        {
            $load = explode(' ', `uptime`);
            return $load;
        }
        else
        {
            return "";
        }
    }
}
list($one, $two, $three) = get_server_load();
//bar width
$width = 300;
//bar height
$height = 20;
$real_load = $one / 2;
$img_handle = imagecreate ($width, $height);
$box_color = imagecolorallocate ($img_handle, 255, 255, 255);
$bar_color = imagecolorallocate ($img_handle, 0, 195, 255);
$text_color = imagecolorallocate ($img_handle, 0, 0, 0);
$real_load = $real_load > 1 ? 1 : $real_load;
imagerectangle ( $img_handle , 0 , 0 , $width, $height, $box_color);
imagefilledrectangle ( $img_handle , 0 , 0 , (int)$width*$real_load, $height, $bar_color);
imagestring($img_handle, 5, $width/2-15, $height/2-7, ($real_load*100).'%', $text_color);
header ("Content-type: image/png");
imagepng ($img_handle);
?>