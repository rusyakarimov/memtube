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

function my_autoloader($class)
{
    include 'classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$db = new db(DBHOST, DBUSER, DBPASSWORD, DBNAME) or die("ERROR");
$error = new Messages();
