<?php
ini_set("display_errors",0);
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
header('Cache-control: private'); // IE 6 FIX
    if($_GET['page'] == "map")
    {
    $maps = "class='active'";
    }
    
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 
// register the session and set the cookie
$_SESSION['lang'] = $lang;
 
setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}
 
switch ($lang) {
  case 'en':
  $lang_file = 'lang.en.php';
  break;
 
  case 'de':
  $lang_file = 'lang.de.php';
  break;
 
  case 'es':
  $lang_file = 'lang.es.php';
  break;
 
  default:
  $lang_file = 'lang.en.php';
 
}
if(!isset($_GET['page']) || $_GET['page'] == "")
{
$_GET['page'] = "home";
} 
include_once 'language/'.$lang_file;
?>
<!DOCTYPE html>
<head>
<?php
require("config/config.php");
require("classes/class_curl.php");
require("classes/class_mysqli.php");
$db = new DB('root', 'xxx', 'database');
echo "<title>".TITLE."</title>";
?>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css" type="text/css" />
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    
<script src="https://use.fontawesome.com/5ea71d2c53.js"></script>

</head>
<body>
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="./" class="navbar-brand"><?=TITLE;?></a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li  <?=$maps;?>>
          <a href="?page=map"><?=$lang['MENU_MAPS'];?></a>
        </li>
				<li>
	        <a href="?page=reg"><?=$lang['MENU_REGISTER'];?></a>
	      </li>
        <li>
          <a href="#" data-toggle="modal" data-target="#myModal"><?=$lang['MENU_LOGIN'];?></a>
        </li>
        <li>
          <a href="#"><?=$lang['MENU_REGIONS'];?></a>
        </li>
          <li>
          <a href="#"><?=$lang['MENU_DOWNLOAD'];?></a>
        </li>
      </ul>
      <?php
      if(isset($_SESSION['WEBUI_LOGGED']))
      {
    

                                 ?>
      <ul class="nav pull-right navbar-nav">
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['FirstName'];?> <?=$_SESSION['LastName'];?> 
      <b class="caret"></b></a>
      <ul class="dropdown-menu">
      <li><a href="?page=buy">Money: <?=include("includes/money.php");?></a></li>
      <li><hr></li>
      <li><a href="logout.php">Logout</a></li>
      </ul>
      </li>
      </ul>
      
      <?php
      }
      ?>
      <ul class="nav pull-right navbar-nav">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
    <?=$lang['MENU_LANG'];?> <i class="fa fa-language" aria-hidden="true"></i>

      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li><a href="?lang=en&amp;page=<?=$_GET['page'];?>">English&nbsp;<img src='images/icons/us.png' alt='English' />/<img src='images/icons/gb.png' alt='English' /></a></li>
      <li><a href="?lang=de&amp;page=<?=$_GET['page'];?>">German&nbsp;<img src='images/icons/de.png' alt='English' /></a></li>
    </ul>
  </li>
</ul>
    </nav>
   </div>
</header> <br><br><br>  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                  </div>
                  <div class="modal-body">
                  <form action="login.php" method="POST">
                
  <span class="fa fa-user" id="basic-addon1"></span>
                  
                  <input type="text" class="form-control" name="logname" aria-describedby="basic-addon1" placeholder="Username" required ><br />
                  <br>
                  
                   <span class="fa fa-key" id="basic-addon2"></span>
                  <input type="password" class="form-control" aria-describedby="basic-addon2" placeholder="*****" name="logpass" required><br />
                 

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Login"><br />
                    <small><?=$lang['ASK_REG'];?></small>
                     </form>
                  </div>
                  
                </div>
              </div>
            </div> 
         
           
<?php                                                     

if(isset($_GET['page']))
{ 
if(file_exists("pages/$_GET[page].php"))
{
require("pages/$_GET[page].php");
}
else
{
require("errors/404.php");
}

}
else
{
require("pages/home.php");
}
?>  
   <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; <?=date('Y');?> <?=TITLE;?><br /><a href="http://www.w3.org/html/logo/">
<img src="https://www.w3.org/html/logo/badge/html5-badge-h-css3.png" width="64" height="34" alt="HTML5 Powered with CSS3 / Styling" title="HTML5 Powered with CSS3 / Styling">
</a></p>
      </div>
    </footer>
  </body>
</html>