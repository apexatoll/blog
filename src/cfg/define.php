<?php

define("ROOT", preg_replace("/\/src.*?$/", "", __DIR__));
define("SRC", ROOT."/src");

foreach(["css", "js"] as $file)
	require_once(__DIR__."/$file.php");
