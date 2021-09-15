<?php

require_once(__DIR__."/../src/cfg/setup.php");

$r = new \core\Router;

$r->get("/", "Pages#index");
$r->get("/about", "Pages#about");
$r->get("/contact", "Pages#contact");

$r->post("/footers/default", "Footers#default");
$r->post("/footers/:menu", "Footers#show");

$r->post("/auth/login", "Auth#login");
$r->post("/auth/logout", "Auth#logout");

$r->route();
