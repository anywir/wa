<?php

define("DEVMODE", '0'); // 1 - на курсах 0- дома  CKeditor
define ("COUNTINPAGE", 4);//кількість новин на сторінку
if (DEVMODE) {
    define("SITE", "http://xxi-lnx/users/phpStart/wir/oop/oop_prj/");
    define("P_METOD","7");
    define("P_CLASS","6");
}
else{
    define("SITE", "http://localhost/wa/wacm/");
    define("P_METOD","4");
    define("P_CLASS","3");
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
