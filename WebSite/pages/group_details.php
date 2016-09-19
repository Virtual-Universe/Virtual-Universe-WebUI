<?php
if(is_logged($_SESSION['uuid']))
{
	$ss = mysql_fetch_array(mysql_query("SELECT Name FROM group_data WHERE GroupID='$_GET[group]'"));
 echo '<div class="panel panel-default pull-left"> 
<div class="panel-heading">Details for Group: "'.$ss[0].'"</div>
 <div class="panel-body"><div class=" adjust">';
 $data = mysql_fetch_array(mysql_query("SELECT * FROM group_data WHERE GroupID='$_GET[group]'"));

$sql = "SELECT AgentID FROM group_membership WHERE GroupID='$_GET[group]'";
$agent = mysql_query($sql);
$found = mysql_fetch_array(mysql_query("SELECT FirstName,LastName FROM user_accounts WHERE PrincipalID='$data[FounderID]'"));
echo "<h4><b>Founder:</b><br /> <a href='?page=profile&amp;user=$data[FounderID]'>$found[0] $found[1]</a></h4>";
echo "<h4><b>Group ID:</b><br /> $data[GroupID] </h4>";
if($_SESSION['uuid'] == $data['FounderID'])
{
	$edit = "<a href='?page=edit_charter&amp;group=$_GET[group]'>Edit Charter</a>";
}
else
{
	$edit = "";
}
echo "<h4><b>Group Charter: <small>$edit</small></b><br /> $data[Charter] </h4>";
echo "<h4><b>Members:</b></h4>";
while($agents = mysql_fetch_array($agent))
{
	$name = mysql_fetch_array(mysql_query("SELECT FirstName,LastName FROM user_accounts WHERE PrincipalID='$agents[0]'"));
	echo "<a href='?page=profile&ampd;user=$agents[0]'>$name[0] $name[1]</a><br />";
}
echo "</div></div></div></div>";
}
else
{
echo "You are not logged in, access to the requested page has been denied";
}
?>

