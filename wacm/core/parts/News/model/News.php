<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 06.06.2016
 * Time: 15:09
 */

namespace model;

use systems\DB;

class News
{
    public static function get($limit)
    {
        $DBase = DB::getInstance();
        $news = $DBase->select("news",null,null,"date",null,$limit);
        return $news;
    }
}