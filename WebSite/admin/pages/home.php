<div class="section group">
	<div class="col span_1_of_2">
  <center>ServerLoad<br>
<img src="serverload.php" style="border:1px solid black;"/>
<?php
if(@fsockopen("127.0.0.1","8002"))
{
$return_text = "<b>Grid Server:</b> <font color='lime'>Active</font>";
}
else
{
$return_text = "<b>Grid Server:</b> <font color='red'>Inactive</font>";
}
if(@fsockopen("127.0.0.1","9000"))
{
$return_text2 = "<b>Region Server:</b> <font color='lime'>Active</font>";
}
else
{
$return_text2 = "<b>Region Server:</b> <font color='red'>Inactive</font>";
}
echo "<h3>Server Status</h3><br>$return_text<br>$return_text2";
?>
</center>
	</div>
	<div class="col span_1_of_2">
<center><h3>Open Tickets</h3><small>Show only <a href='?Type=Abuse'>Abuse Reports</a> / <a href='?Type=Ticket'>Tickets</a> / <a href='?'>All</a></small><hr><?php
if($_GET['Type'] == "Abuse")
{
$after = "AND SystemType = 'Abuse'";
}
if($_GET['Type'] == "Ticket")
{
$after = "AND SystemType = 'Ticket'";
}
$SQL = "SELECT * FROM abusereports WHERE Checked = '0' $after ORDER BY Number DESC";
$new = mysql_query($SQL);
while($abuse = mysql_fetch_array($new))
{
echo "<b>Type:</b> <font color='red'>$abuse[SystemType]</font><br>
<b>Category:</b> $abuse[Category] <br>
<b> Opened by:</b> $abuse[ReporterName] <br>
 <b>Summary:</b> $abuse[AbuseSummary]<br>
 <b>Assigned to:</b> $abuse[AssignedTo]<br>
<a href='?page=read_ticket&id=$abuse[Number]'>Read</a><hr><br>";
}
?>  </center>
	</div>
</div>