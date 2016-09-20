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
        include_once "templates/header.php";        
        //include_once "templates/dump.php"; //дамп дати
        if ($edit)
        {
            include_once "templates/logout.php";
            include_once "templates/modblock.php";
            include_once "templates/newsedit.php";
            foreach ($data['review'] as $eachrev)
            {

                include "templates/reviewedit.php";
            }
        }
        else
        {

            include_once "templates/news.php";
            foreach ($data['review'] as $eachrev) 
            {
                include "templates/review.php";
                include "templates/section.php";
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