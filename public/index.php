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
$r->get("/posts/edit/:id", "Posts#form_edit");
$r->get("/posts/unpublished", "Posts#unpublished", "val_admin");
$r->get("/posts/:id", "Posts#view");

$r->post("/posts/publish/:id", "Posts\Publish#publish");
$r->post("/posts/new/submit", "Posts#new", "val_can_post");
$r->post("/posts/edit/submit/:id", "Posts#edit");
$r->post("/posts/unpublish/:id", "Posts\Publish#unpublish");
$r->post("/posts/delete/:id", "Posts#delete");

$r->post("/comments/new", "Comments#new", "val_logged_in");
$r->post("/comments/print/:id", "Comments#print");
$r->post("/comments/delete", "Comments#delete");
$r->post("/comments/reply/show", "Comments#show_reply");
$r->post("/comments/edit/show", "Comments#show_edit");
$r->post("/comments/edit/submit", "Comments#edit");

$r->post("/popups/confirm", "Popups#confirm");

$r->post("/finders/show/:screen", "PostFinders#show");

$r->route();
