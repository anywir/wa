<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 15.08.2016
 * Time: 12:03
 */

namespace model;
use systems\DB;

class Sticker
{

    public static function get($id) //àéäèøíèê ïîäëîæêè
    {
        $DBase = DB::getInstance();
        $sql = "SELECT st.*, s.style FROM `sticker` AS st
        LEFT JOIN `styles` AS s ON s.id = st.id_style WHERE st.id_review=".$id;
        $sticker=$DBase->sendQuery($sql);
        return $sticker;
    }

    public function update($id,$sign, $text, $id_review, $id_style)
    {
        $columns=['sign'=>$sign,'text'=>$text];
        if ($id_review) $columns['id_review']=$id_review;
        if ($id_style) $columns['id_style']=$id_style;

        $DBase = DB::getInstance();
        $res = $DBase->update('sticker',['id'=>$id],$columns);

        return ['id'=>$res?1:-1];
    }

    public function add($sign, $text, $id_review, $id_style)
    {
        $DBase = DB::getInstance();
        $res = $DBase->insert('sticker',['sign'=>$sign,'text'=>$text,'id_review'=>$id_review,'id_style'=>$id_style]);
        return ['id'=>$res?1:-1];
    }

}