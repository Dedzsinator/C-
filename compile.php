<?php

	$languageID=$_POST["language"];
        error_reporting(0);

	switch($languageID) {
		case "cpp": {
			include("compilers/cpp.php");
			break;
		}
		case "python": {
			include("compilers/python.php");
			break;
		}
	}
?>