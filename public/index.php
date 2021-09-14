<?php

require_once(__DIR__."/../src/cfg/setup.php");

$r = new \core\Router;

$r->get("/", "Pages#index");

$r->route();
