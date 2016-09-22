<?php

?>
<form action="?page=tcreate" method="POST">
<b>Select Categorie</b><br />
<select name="categorie" class="selectpicker">
<option value="appereance">Avatar Appereance</select>
<option value="region_issues">Region Issues</select>
<option value="account_issues">Account Issues</select>
</select><br />
<b>Region: <small>(only required on Region Issues)</small></b>
<br>
<input type="text" name="region"><br>
<b>Subject</b>
<input type="text" name="subject"><br>
<b>Message</b>
<br>
<textarea name="message"></textarea>
<br>
<input type="submit" value="Open Ticket">
</form>
