<html>
<head>

</head>
<body>
<?php 
if(is_logged($_SESSION['uuid']))
{
?>
<form name="ajaxform" id="ajaxform" action="post.php" method="POST">
	Amount of Currency to add: <input type="text" name="amount" value ="0"/> <br/>
  <input type="submit"  id="simple-post" value="Run Code" />
</form>

<div id="simple-msg"></div>
<?php 
}
else
{
echo "You are not logged in, access to the requested page has been denied";
}
?>

</body>