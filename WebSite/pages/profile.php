<?php
if(is_logged($_SESSION['uuid']))
{
 echo '<div class="panel panel-default pull-left"> 
<div class="panel-heading">Profile</div>
 <div class="panel-body">';
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
                     
                                     echo "<center><h3><b>Account Info:</b></h3><hr>";
                                            
                                               $profileImage = $verified[profile][Image];
                                                 $display = $verified[profile][DisplayName];
                                     $name = $verified[account][Name];
                                     $account = $verified[account][AccountInfo];
                                     $account = str_replace("\n","&nbsp;",$account);
            if ($profileImage == "00000000-0000-0000-0000-000000000000" || $profileImage == "")
            {
                $profileLink = "https://github.com/WhiteCoreSim/WhiteCore-Webui/raw/master/WebSite/images/info.jpg";
            }
            else
            {
                $profileLink = WEBUI_TEXTURE_SERVICE . '/index.php?method=GridTexture&uuid=' . $profileImage;
          }

echo "<img src='$profileLink'/><br /><hr>";
                                   
                                     echo "Username: <br /><b>$name</b><hr> <br />DisplayName: <br /><b>$display</b><br />";
                              
                                             //          print_r($verified['profile']);
                                                       $wantto = $verified['profile']['WantToText'];
                                                       $cando = $verified['profile']['CanDoText'];
                                                       $lang = $verified['profile']['Languages'];
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
   echo "<div class=' adjust'> <button type=\"button\" class=\"btn btn-info\" data-toggle=\"collapse\" data-target=\"#interests\">Interests</button><center><div id=\"interests\" class=\"collapse\"><h3><b>I want to:</b></h3><br /><table>
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
</table></table><br />Other Things i want to do: $wantto<br />";
    $skillsmask = array();
		$skillsmask['textures']			=  1;
		$skillsmask['architecture']		=  2;
		$skillsmask['modeling']			=  8;
		$skillsmask['eventplanning']	=  4;
		$skillsmask['scripting']		= 16;
		$skillsmask['customcharacters']	= 32;
    
       if($verified['profile']['CanDoMask'][3] & $skillsmask['textures']) { $textures = "yes"; } else { $textures = "no"; }
   if($verified['profile']['CanDoMask'][3] & $skillsmask['architecture']) { $arch = "yes"; } else { $arch = "no"; }
   if($verified['profile']['CanDoMask'][3] & $skillsmask['modeling']) { $model = "yes"; } else { $model = "no"; }
   if($verified['profile']['CanDoMask'][3] & $skillsmask['eventplanning']) { $event = "yes"; } else { $event = "no"; }
   if($verified['profile']['CanDoMask'][3] & $skillsmask['scripting']) { $script = "yes"; } else { $script = "no"; }
   if($verified['profile']['CanDoMask'][3] & $skillsmask['customcharacters']) { $custom = "yes"; } else { $custom = "no"; }
      echo "<center><h3><b>Skills:</b></h3><br /><table>
<tbody>
<tr>
<td>Textures&nbsp;</td>
<td><img src='images/$textures.png'></td>
<td>Architecture</td>
<td><img src='images/$arch.png'></td>
</tr>
<tr>
<td>Modeling</td>
<td><img src='images/$model.png'></td>
<td>Event Planning</td>
<td><img src='images/$event.png'></td>
</tr>
<tr>
<td>Scripting</td>
<td><img src='images/$script.png'></td>
<td>Custom Charactes</td>
<td><img src='images/$custom.png'></td>
</tr>
</tbody>
</table></table> <br />Other things i Can do: $cando<br />Languages: $lang</div>  </div></div></div>";
 echo '<div class="panel panel-default pull-left"> 
<div class="panel-heading">Groups</div>
 <div class="panel-body"><div class=" adjust"> ';
$sql = "SELECT * FROM group_membership WHERE AgentID = '$user' AND ListInProfile='1'";
$prepare = mysql_query($sql);
while($group = mysql_fetch_array($prepare))
{
	$ss = mysql_fetch_array(mysql_query("SELECT Name FROM group_data WHERE GroupID='$group[GroupID]'"));
	echo "<center><a href='?page=group_details&amp;group=$group[GroupID]'>$ss[0]</a></center><br>";
}
echo "</div></div></div></div>";  
}
                               else
{
echo "You are not logged in, access to the requested page has been denied";
}
    
?>  
