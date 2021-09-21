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
$r->get("/posts/:id", "Posts#view", "val_published");

$r->post("/posts/publish/:id", "posts\Publish#publish");
$r->post("/posts/new/submit", "Posts#new", "val_can_post");
$r->post("/posts/edit/submit/:id", "Posts#edit");
$r->post("/posts/unpublish/:id", "posts\Publish#unpublish");
$r->post("/posts/delete/:id", "Posts#delete");

$r->post("/comments/new", "Comments#new", "val_logged_in");
$r->post("/comments/print/:id", "Comments#print");
$r->post("/comments/delete", "Comments#delete");
$r->post("/comments/reply/show", "Comments#show_reply");
$r->post("/comments/edit/show", "Comments#show_edit");
$r->post("/comments/edit/submit", "Comments#edit");

$r->post("/popups/confirm", "Popups#confirm");
$r->post("/popups/signup", "Popups#signup");

$r->post("/finders/show/:screen", "PostFinders#show");

$r->post("/users/bookmark/:id", "Users#bookmark", "val_logged_in");
$r->post("/users/register", "Users#register");

$r->get("/series/new", "Series#show_new", "val_can_post");
$r->get("/series/sort/:id", "Series#show_sort", "val_admin");
$r->get("/series/edit/:id", "Series#show_edit");
$r->get("/series/:title", "Series#view", "val_published");

$r->post("/series/new/submit", "Series#new");
$r->post("/series/publish/:id", "Series#publish");
$r->post("/series/unpublish/:id", "Series#unpublish");
$r->post("/series/sort/submit/:id", "Series#sort");
$r->post("/series/edit/submit/:id", "Series#edit");

$r->get("/series/:title", "Series#view");

$r->post("/contact/submit", "Contacts#submit");

$r->route();
