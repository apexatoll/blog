<?php

require_once(__DIR__."/../src/cfg/setup.php");

$r = new \core\Router;

$r->get("/", "Pages#index");
$r->get("/about", "Pages#about");
$r->get("/contact", "Pages#contact");

$r->route();
