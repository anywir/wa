<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 06.06.2016
 * Time: 15:11
 */

namespace view;


class Mainpage
{
    public function show($data,$edit,$login)
    {
        include_once "templates/head.php";

        if ($edit)
        {
            include_once "templates/logout.php";
            include_once "templates/modblock.php";
            include_once "templates/newsedit.php";
            include_once "templates/reviewedit.php";
        }
        else
        {
            include_once "templates/news.php";
            foreach ($data['review'] as $eachrev) 
            {
                include_once "templates/review.php";
                include_once "templates/section.php";
            }

        }
        if ($login)
        {
        include_once "templates/modlogin.php";
        }
        include_once "templates/footer.php";
        include_once "templates/scripts.php";
        include_once "templates/end.php";
    }
}