<?php
session_start();
date_default_timezone_set("Asia/Novosibirsk");
define("COPYRIGHT", "© 2022, «MEM-TUBE»");
define("COPYRIGHT_DESC", "Сервис для обмена готовыми мемами.");
define("KEYWORDS", "MEM-TUBE, мемы, скачать мемы");
define("DESCRIPTION", "MEM-TUBE - сервис для обмена готовыми мемами");
define("DBHOST", "localhost");
define("DBUSER", "rusya");
define("DBPASSWORD", "rusya");
define("DBNAME", "rusya");

define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT']);

function makeTime($string)
{
    if ($string < 3600) {
        $string = sprintf("%02d:%02d", (int)($string / 60) % 60, $string % 60);
    } else {
        $string = sprintf("%02d:%02d:%02d", (int)($string / 3600) % 24, (int)($string / 60) % 60, $string % 60);
    }
    return $string;
}

function my_autoloader($class)
{
    include 'classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$db = new db(DBHOST, DBUSER, DBPASSWORD, DBNAME) or die("ERROR");
$user = new user();
