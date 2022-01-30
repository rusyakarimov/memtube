<?php
require_once __DIR__ . '/inc/config.php';
/* Единая точка входа в приложение */
/* GET URL */
$url = key($_GET);

$r = new Router();
/* pages */
$r->addRoute("/main", "main.php");
$r->addRoute("/guest", "guest.php");
$r->addRoute("/search", "search.php");
$r->addRoute("/auth", "auth.php");
$r->addRoute("/reg", "reg.php");
$r->addRoute("/view", "view.php");
$r->addRoute("/del_file", "delete.php");
$r->addRoute("/cat", "categories.php");
$r->addRoute("/recovery", "p_r.php");
$r->addRoute("/info", "about.php");
$r->addRoute("/faq", "faq.php");
$r->addRoute("/ajax", "ajax.php");
/* add */
$r->addRoute("/addmem", "addmem.php");
$r->addRoute("/newcat", "addcat.php");
/* feedback */
$r->addRoute("/feedback_mem", "feedback_addmem.php");
$r->addRoute("/feedback_cat", "feedback_addcat.php");
$r->addRoute("/feedback_auth", "feedback_auth.php");
$r->addRoute("/feedback_reg", "feedback_reg.php");
$r->addRoute("/feedback_pr", "feedback_pr.php");
/* other */
$r->addRoute("/logout", "exit.php");
$r->addRoute("/error_page", "error_page.php");
$r->addRoute("/genpass", "genpass.php");
$r->addRoute("/404", "404.php");
/* routing */
$r->route("pages/", "/" . $url);
