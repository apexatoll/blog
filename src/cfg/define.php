<?php

define("ROOT", preg_replace("/\/src.*?$/", "", __DIR__));
define("SRC", ROOT."/src");

define("MODEL_NS", "models");
define("VIEW_NS",  "views");
define("CTRL_NS",  "ctrls");

foreach(["css", "js"] as $file)
	require_once(__DIR__."/$file.php");
