<pre><center><h2>Regions</h2><center><hr><?php
$data = array("Method" => "GetRegions", 'WebPassword' => md5(WEBUI_PASSWORD));
  $verified = $curl->perform_action($data);
                               print_r($verified);
                        foreach($verified as $regions => $region)
                        {
                  foreach($region as $nregion)
                  {
                 // print_r($nregion);
                  $name = mysql_fetch_array(mysql_query("SELECT * FROM user_accounts WHERE PrincipalID = '$nregion[owner_uuid]'"));
                 
                  $locx = $nregion['locX'] / 256;
                  $locy = $nregion['locY'] / 256;
               echo "<b>Owner:</b> $name[FirstName] $name[LastName] <b>Location:</b> $locx,$locy <b>Name:</b> $nregion[regionName] <center><a href='?page=map&xloc=$locx&amp;locy=$locy'><small>See on Map</small></a></center><hr>";
                  }
                        }
?> </pre>