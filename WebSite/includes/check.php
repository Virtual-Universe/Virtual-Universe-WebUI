<?php
function is_logged($var)
{
if(isset($var))
{
return true;
}
else
{
return false;
}
}
function displayDOB()
{	
		echo "<select class='black' name='tag'>"; 
	for ($i = 1; $i <= 31; $i++) 
	{
		echo("<option value=\"$i\" ");
		if ($tag == $i)
			echo("selected ");
		echo(">$i");
	}
	echo "</select>";

		echo "<select class='black' name='monat'>"; 
	for ($i = 1; $i <= 12; $i++) 
	{
		echo("<option value=\"$i\" ");
		if ($monat == $i)
			echo("selected ");
		echo(">$i");
	}
	echo "</select>";
		echo "<select class='black' name='jahr'>"; 
	$jetzt = getdate();
	$jahr1 = $jetzt["year"];

	for ($i = 1920; $i <= $jahr1; $i++) {
		echo("<option value=\"$i\" ");
		if ($jahr == $i)
			echo("selected ");
		echo(">$i");
	}
  	echo "</select>";
}

?>