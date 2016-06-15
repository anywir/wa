<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 06.06.2016
 * Time: 15:11
 */

namespace model;


use systems\DB;

class Mainpage
{
    public function getmain()
    {
        $news = \model\News::get([0,COUNTINPAGE]);
        $data['news']=$news;
        return $data;
    }


}