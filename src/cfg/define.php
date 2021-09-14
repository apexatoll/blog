<?php

define("ROOT", preg_replace("/\/src.*?$/", "", __DIR__));
define("SRC", ROOT."/src");

define("MODEL_NS", "models");
define("VIEW_NS",  "views");
define("CTRL_NS",  "ctrls");

define("MODEL_PATH", SRC."/".MODEL_NS);
define("VIEW_PATH",  SRC."/".VIEW_NS);
define("CTRL_PATH",  SRC."/".CTRL_NS);

foreach(["css", "js"] as $file)
	require_once(__DIR__."/$file.php");
