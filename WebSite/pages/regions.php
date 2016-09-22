<pre><center><h2>Regions</h2><center><hr><?php
$sql = "SELECT * FROM gridregions";
$perf = mysql_query($sql);
while  ($nregion = mysql_fetch_array($perf))
{
	 $name = mysql_fetch_array(mysql_query("SELECT * FROM user_accounts WHERE PrincipalID = '$nregion[OwnerUUID]'"));
                 
                  $locx = $nregion['LocX'] / 256;
                  $locy = $nregion['LocY'] / 256;
 echo "<b>Owner:</b> $name[FirstName] $name[LastName] <b>Location:</b> $locx,$locy <b>Name:</b> $nregion[RegionName] <center><a href='?page=map&xloc=$locx&amp;locy=$locy'><small>See on Map</small></a></center><hr>";
}
?> </pre>
