<?php namespace cfg;

require_once(__DIR__."/define.php");
require_once(__DIR__."/Autoloader.php");

Autoloader::initialize();
Environment::initialize();

session_start();
