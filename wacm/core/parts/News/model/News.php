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
        $news = $DBase->select("news",null,null,"date","DESC",$limit);
        return $news;
    }

    public function update($id,$tema,$text,$autor,$date)
    {
        $DBase = DB::getInstance();
        $res = $DBase->update('news',['id'=>$id],['tema'=>$tema,'text'=>$text,'id_autor'=>$autor,'date'=>$date]);
        return ['id'=>$res?1:-1];
    }

    public function add($tema,$text,$autor,$date)
    {
        $DBase = DB::getInstance();
        $res = $DBase->insert('news',['tema'=>$tema,'text'=>$text,'id_autor'=>$autor,'date'=>$date]);
        return ['id'=>$res?1:-1];
    }

}