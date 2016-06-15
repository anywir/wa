<?php

define("DEVMODE", '0'); //   CKeditor
define ("COUNTINPAGE", 6);//кількість новин на сторінку
if (DEVMODE) {
    define("SITE", "http://localhost/wa/wacm/");
    define("P_METOD","4");
    define("P_CLASS","3");
    define("DBCONN","mysql:host=localhost;dbname=wacm");
}
else{
    define("SITE", "http://localhost/wa/wacm/");
    define("P_METOD","4");
    define("P_CLASS","3");
    define("DBCONN","mysql:host=localhost;dbname=wacm");
}

function __autoload($className)
{
    if (explode("\\", $className)) {
        $array = explode("\\", $className);
        if ($array[1]) {
            $namespace = $array[0];
            $className = array_pop($array);
        }
    }
    if (file_exists("core/parts/$className/$namespace/$className.php"))
    {
        include_once("core/parts/$className/$namespace/$className.php");
    }

    if (file_exists("core/$namespace/$className.php"))
    {
        include_once("core/$namespace/$className.php");
    }
}
