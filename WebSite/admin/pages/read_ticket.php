<?php
$sql = "SELECT * FROM abusereports WHERE Number='$_GET[id]'";
$state = mysql_fetch_array(mysql_query($sql));

?>
<div class="section group">
	<div class="col span_1_of_2"><center>
   <h3>Ticket:</h3><?=$state[AbuseSummary];?><hr>
   <h3>Message:</h3> <?=$state[AbuseDetails];?><hr>
   </center>
  </div>
  <div class="col span_1_of_2">
<center><h3>Details</h3><hr><?php
echo "Opened by: $state[ReporterName]<br />
Category: $state[Category]<br />
Assigned to: $state[AssignedTo]<br />
Type: $state[SystemType] <br /><hr>
<small>Actions:<br /> <a href='?page=assign_staff&id=$_GET[id]'>Assign Staff</a><br />
<a href='?page=reply&id=$_GET[id]'>Reply</a><br />
<a href='?page=close&id=$_GET[id]'>Close</a></small><br />";
?></center>
  </div>
  </div>