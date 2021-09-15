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

$r->get("/posts", "Posts#index");
$r->get("/posts/new", "Posts#form_new", "val_can_post");
$r->get("/posts/:id", "Posts#view");

$r->post("/popups/confirm", "Popups#confirm");

$r->route();
