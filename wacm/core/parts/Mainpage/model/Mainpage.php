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
        $DBase = DB::getInstance();

        $news = $DBase->select("news",null,null,"date",null,[0,5]);
        $data['news']=$news;
        return $data;
    }


}