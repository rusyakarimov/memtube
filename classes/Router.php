<?php
/* ROUTING FOR APP */
class Router
{
    private $pages = array();

    function addRoute($url, $path)
    {
        $this->pages[$url] = $path;
    }

    function route($dir, $url)
    {
        $path = $this->pages[$url];
        $file_dir = $dir . $path;

        if ($path == "") {
            header("Location: ../404.php");
            die();
        }

        if (file_exists($file_dir)) {
            require_once $file_dir;
        } else {
            header("Location: ../404.php");
            die();
        }
    }
}
