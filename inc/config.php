<?php
session_start();

define("COPYRIGHT", "© 2022, «MEM-TUBE»");
define("COPYRIGHT_DESC", "Сервис для обмена готовыми мемами.");
define("KEYWORDS", "MEM-TUBE, мемы, скачать мемы");
define("DESCRIPTION", "MEM-TUBE - сервис для обмена готовыми мемами");
define("DBHOST", "localhost");
define("DBUSER", "rusya");
define("DBPASSWORD", "rusya");
define("DBNAME", "rusya");

define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT']);

require_once ROOT_DIR . '/classes/Db.php';
require_once ROOT_DIR . '/classes/User.php';
require_once ROOT_DIR . '/classes/Messages.php';
require_once ROOT_DIR . '/classes/Router.php';

$dbhost = 'localhost';
$dbuser = 'rusya';
$dbpass = 'rusya';
$dbname = 'rusya';

$db = new db(DBHOST, DBUSER, DBPASSWORD, DBNAME) or die("ERROR");

$error = new Messages();
