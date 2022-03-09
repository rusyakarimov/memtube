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
$r->addRoute("/cat", "categories.php");
$r->addRoute("/recovery", "p_r.php");
$r->addRoute("/info", "about.php");
$r->addRoute("/faq", "faq.php");
$r->addRoute("/profile", "profile.php");
$r->addRoute("/show_my", "show_my.php");
$r->addRoute("/", "main.php");
/* add and edit*/
$r->addRoute("/addmem", "addmem.php");
$r->addRoute("/newcat", "addcat.php");
$r->addRoute("/edit_mem", "edit_mem.php");
$r->addRoute("/edit_comm", "edit_comm.php");
$r->addRoute("/edit_profile", "edit_profile.php");
/* delete */
$r->addRoute("/del_comm", "del_comm.php");
$r->addRoute("/del_file", "delete.php");
$r->addRoute("/del_myself", "del_myself.php");
/* feedback */
$r->addRoute("/feedback_mem", "feedback_addmem.php");
$r->addRoute("/feedback_cat", "feedback_addcat.php");
$r->addRoute("/feedback_auth", "feedback_auth.php");
$r->addRoute("/feedback_reg", "feedback_reg.php");
$r->addRoute("/feedback_pr", "feedback_pr.php");
$r->addRoute("/feedback_comment", "feedback_comment.php");
$r->addRoute("/feedback_mem_edit", "feedback_edit_mem.php");
$r->addRoute("/feedback_comm_edit", "feedback_edit_comm.php");
$r->addRoute("/feedback_edit_profile", "feedback_edit_profile.php");

/* other */
$r->addRoute("/logout", "exit.php");
$r->addRoute("/error_page", "error_page.php");
$r->addRoute("/genpass", "genpass.php");
$r->addRoute("/404", "404.php");
/* routing */
$r->route("pages/", "/" . $url);
