<?php
$sql = "INSERT INTO tickets SET user='$_SESSION[uuid]',cat='$_POST[categorie]',region=$_POST[region],subject='$_POST[subject]',message='$_POST[message]'";
?>