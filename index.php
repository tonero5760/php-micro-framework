<?php 
session_start();
define('APP_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', '/bobjoe/'); //when offline change to /bobjoe/
define('SITE_TITLE', 'Bob Joe Blog');

$url = explode('/',trim((parse_url($_SERVER['REQUEST_URI']))['path'],'/'));
$to =  sizeof($url) < 2 ? '/' : $url[1];

//import your DB connection
require_once "app/Connect.php";
$conn = new Connect('localhost', 'root', '', 'bobjoe');


require_once("app/utils/helpers.php");
require_once "app/utils/validate.php";
require_once("app/Session.php");

require_once('app/Router.php');

