<?php
if(empty($_GET['user']) || $_GET['user'] == "")
{
$user = $_SESSION['uuid'];
}
else
{
$user = $_GET['user'];
}
$data = array("Method" => "GetProfile",  'WebPassword' => md5(WEBUI_PASSWORD),
                                 'UUID' => $user);
                                     $verified = $curl->perform_action($data);
///Dont anyone ever dare to ask me doing bitmasks again i HATE those thing like gargamel hates the smurfs!!!!!!
     $wantmask = array();
		$wantmask['build']		=   1;
		$wantmask['explore']	=   2;
		$wantmask['meet']		=   4;
		$wantmask['behired']	=  64;
		$wantmask['group']		=   8;
		$wantmask['buy']		=  16;
		$wantmask['sell']		=  32;
		$wantmask['hire']		= 128;
   if($verified['profile']['WantToMask'][3] & $wantmask['build']) { $build = "yes"; } else { $build = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['explore']) { $explore = "yes"; } else { $explore = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['meet']) { $meet = "yes"; } else { $meet = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['behired']) { $hired = "yes"; } else { $hired = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['group']) { $group = "yes"; } else { $group = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['buy']) { $buy = "yes"; } else { $buy = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['sell']) { $sell = "yes"; } else { $sell = "no"; }
   if($verified['profile']['WantToMask'][3] & $wantmask['hire']) { $hire = "yes"; } else { $hire = "no"; }
   echo "<table>
<tbody>
<tr>
<td>Build&nbsp;</td>
<td><img src='images/$build.png'></td>
<td>Explore</td>
<td><img src='images/$explore.png'></td>
</tr>
<tr>
<td>Meet</td>
<td><img src='images/$meet.png'></td>
<td>Be Hired</td>
<td><img src='images/$hired.png'></td>
</tr>
<tr>
<td>Group</td>
<td><img src='images/$group.png'></td>
<td>Buy</td>
<td><img src='images/$buy.png'></td>
</tr>
<tr>
<td>Sell</td>
<td><img src='images/$sell.png'></td>
<td>Hire</td>
<td><img src='images/$hire.png'></td>
</tr>
</tbody>
</table>";
?>