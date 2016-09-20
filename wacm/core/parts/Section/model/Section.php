<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 21.06.2016
 * Time: 15:12
 */

namespace model;
use systems\DB;

class Section
{
    public static function get($id = null)
    {
        $where = ($id==null)?"":" WHERE se.id_review = ".$id;
        $DBase = DB::getInstance();
        $sql = "SELECT se.*, s.style FROM `section` AS se
        LEFT JOIN `styles` AS s ON s.id = se.id_style". $where;
        $sections = $DBase->sendQuery($sql);
        $n=0;
        foreach ($sections as $section)
        {
            $sections[$n]['images'] = $DBase->select("images", null,['id_section'=>$section['id']]);
            $n++;
        }
        return $sections;


    }
}