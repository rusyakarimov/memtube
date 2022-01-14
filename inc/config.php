<?php
session_start();
require_once __DIR__ . '/../classes/Db.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Messages.php';


define("COPYRIGHT", "© 2022, «MEM-TUBE»");
define("COPYRIGHT_DESC", "Сервис для обмена готовыми мемами.");
define("KEYWORDS", "MEM-TUBE, мемы, скачать мемы");
define("DESCRIPTION", "MEM-TUBE - сервис для обмена готовыми мемами");
define("HOST", "localhost");
define("USER", "rusya");
define("PASSWORD", "rusya");
define("DBNAME", "rusya");

$dbhost = 'localhost';
$dbuser = 'rusya';
$dbpass = 'rusya';
$dbname = 'rusya';

$db = new db($dbhost, $dbuser, $dbpass, $dbname) or die("ERROR");

$error = new Messages();
