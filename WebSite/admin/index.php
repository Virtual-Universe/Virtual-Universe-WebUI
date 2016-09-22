<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
header('Cache-control: private'); // IE 6 FIX
require("../config/config.php");
require("../classes/class_curl.php");
require("../includes/check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="../css/custom.css" />
<script src="https://use.fontawesome.com/5ea71d2c53.js"></script>
<title><?=TITLE;?> - Admin</title>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src='js/tinymce/tinymce.min.js'></script>
<script src="js/form-validation.js"></script>
<script>
tinymce.init({
selector: '#ticketarea',
height: '300px',
width: '600px' ,
theme: "modern",
skin: 'custom',
force_br_newlines : false,
force_p_newlines : false,
forced_root_block : '',
cleanup : true ,
remove_redundant_brs : true
});
</script>
</head>
<body class="container_me">
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<li> <a class="navbar-brand" href="/admin">
<?=HTML_TITLE;?>
</a> </li>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<?php if (!is_logged($_SESSION['admin_log']))
{
echo '<ul class="nav pull-right navbar-nav">
<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
</ul>'; 
}
else
{
?>
<ul class="nav pull-right navbar-nav">
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['FirstName'];?> <?=$_SESSION['LastName'];?> 
<b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="?page=buy">Money: <?=include("../includes/money.php");?></a></li>
<li><hr></li>
<li><a href="?page=profile">My Profile</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</li>
</ul>
<?
}
echo '<ul class="nav pull-right navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
Language<i class="fa fa-language" aria-hidden="true"></i>
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="?lang=en">English&nbsp;<img src="images/icons/us.png" alt="English" />/<img src="images/icons/gb.png" alt="English" /></a></li>
<li><a href="?lang=de">German&nbsp;<img src="images/icons/de.png" alt="German" /></a></li>
</ul>
</li>
</ul>';
echo '<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
User&nbsp;<i class="fa fa-user" aria-hidden="true"></i>
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="?page=open_tickets">Open Tickets</a></li>
<li><a href="?lang=ticket_archive">Ticket Archive</a></li>
</ul>
</li>
</ul>';
echo '<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
Server&nbsp;<i class="fa fa-server" aria-hidden="true"></i>
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="?page=open_tickets">Open Tickets</a></li>
<li><a href="?lang=ticket_archive">Ticket Archive</a></li>
</ul>
</li>
</ul>';
echo '<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
Tickets&nbsp;<i class="fa fa-ticket" aria-hidden="true"></i>
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="?page=open_tickets">Open Tickets</a></li>
<li><a href="?lang=ticket_archive">Ticket Archive</a></li>
</ul>
</li>
</ul>';
echo '<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
Economy&nbsp;<i class="fa fa-money" aria-hidden="true"></i>
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="?page=give_money">Give Money</a></li>
<li><a href="?lang=see_transactions">See all Transactions</a></li>
</ul>
</li>
</ul>';
?>
</div>
</div>
</nav>
<?php

if(isset($_GET['page']))
{ 
if(file_exists("pages/$_GET[page].php"))
{
require("pages/$_GET[page].php");
}
else
{
require("../errors/404.php");
}

}
else
{
require("pages/home.php");
}
?>
</body>
<html>
