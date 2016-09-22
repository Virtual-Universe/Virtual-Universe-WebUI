<?php
ini_set("display_errors",0);
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
header('Cache-control: private'); // IE 6 FIX
require("config/config.php");
require("classes/class_curl.php");
require("includes/check.php");
include("includes/json.php");
    if($_GET['page'] == "map")
    {
    $maps = "class='active'";
    }
    else
    {
    $maps = null;         
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="includes/slmapapi.php"></script>
    <link rel="stylesheet" type="text/css" href="css/slmapapi.css" />
       <link rel="stylesheet" type="text/css" href="css/custom.css" />

    <script type="text/javascript">
    function loadmap(){
        var coords = {'x' : <?php  echo $mapstartX; ?> + 0.5, 'y' : <?php echo $mapstartY; ?> + 0.5},
        mapInstance = new SLURL.Map(document.getElementById('map-container'), {'overviewMapControl':true});
        mapInstance.centerAndZoomAtSLCoord(new SLURL.XYPoint(coords.x, coords.y), 3);}
    $(document).ready(loadmap);
    </script>   
    <script type="text/javascript">
$(document).ready(function() {
    $('dropdown-toggle').dropdown()
});
</script> 
<script src="https://use.fontawesome.com/5ea71d2c53.js"></script>

  <title><?=TITLE;?></title>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
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
  
    function validate() {
        if ((tinymce.EditorManager.get('message').getContent()) == '') {
            alert('Blog Description can not be empty.');
            return false;
        }
    }
  </script>
</head>
<body class="container_me">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <li> <a class="navbar-brand" href="/">
                  <?=HTML_TITLE;?>
                </a> </li>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li>
          <a href="?page=map"><?php echo $lang['MENU_MAPS']; ?></a>
        </li>
				<li>
	        <a href="?page=reg"><?php $lang['MENU_REGISTER']; ?></a>
	      </li>
                    <li>
          <a href="?page=regions"><?php echo $lang['MENU_REGIONS']; ?></a>
        </li>
          <li>
          <a href="#"><?echo $lang['MENU_DOWNLOAD']; ?></a>
        </li>
                </ul>
                <?php if (!is_logged($_SESSION['uuid']))
                {
                
          echo '       <ul class="nav pull-right navbar-nav">
                   <li>     <a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
        </ul>'; 
        }
        else
        {
        ?>
         <ul class="nav pull-right navbar-nav">
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['FirstName'];?> <?=$_SESSION['LastName'];?> 
      <b class="caret"></b></a>
      <ul class="dropdown-menu">
      <li><a href="?page=buy">Money: <?php include("includes/money.php"); ?></a></li>
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
        ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>
<!-- Login -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
			<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="login.php" method="post">
					<input type="text" name="logname" placeholder="Username">
					<input type="password" name="logpass" placeholder="Password">
				<button type="submit">Login</button>
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
    </div>

  </div>
<!-- /login -->
<?php
 if(isset($_SESSION['uuid']))
 {
 $data = array("Method" => "GetFriends",  'WebPassword' => md5(WEBUI_PASSWORD), 'UserID' => $_SESSION['uuid']);
$verified = $curl->perform_action($data);
foreach($verified as $key => $friend)
{
foreach ($friend as $friends)
{
$uid = $friends['PrincipalID'];
$fname = $friends['Name'];
$new .= "<a href='?page=profile&amp;user=$uid'>$fname</a><br />";
}
 }
 echo $new;
 }                                                    

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

        
  </body>
</html>
