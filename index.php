<?php
require_once __DIR__ . '/inc/config.php';
$title = "MEM-TUBE - Скачайте и пользуйтесь!";
//require_once __DIR__ . '/inc/header.php';


$url = key($_GET);


$r = new Router();
$r->addRoute("/", "main.php");
$r->addRoute("/guest", "guest.php");
$r->addRoute("/search", "search.php");
$r->addRoute("/auth", "auth.php");
$r->addRoute("/reg", "reg.php");
$r->addRoute("/view", "view.php");
$r->addRoute("/del_file", "delete.php");
$r->addRoute("/newcat", "addcat.php");
$r->addRoute("/cat", "categories.php");
$r->addRoute("/addmem", "addmem.php");
$r->addRoute("/feedback_mem", "feedback_addmem.php");
$r->addRoute("/feedback_cat", "feedback_addcat.php");
$r->addRoute("/feedback_auth", "feedback_auth.php");
$r->addRoute("/feedback_reg", "feedback_reg.php");
$r->addRoute("/logout", "exit.php");
$r->addRoute("/error_page", "error_page.php");
$r->addRoute("/genpass", "genpass.php");
$r->addRoute("/404", "404.php");

$r->route("pages/", "/" . $url);
