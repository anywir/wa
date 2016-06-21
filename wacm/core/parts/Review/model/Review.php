<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 21.06.2016
 * Time: 12:06
 */

namespace model;

use systems\DB;

class Review
{
    public static function get($id)
    {
        $DBase = DB::getInstance();
        $sql = "SELECT r.*, s.style FROM `review` AS r
        LEFT JOIN `styles` AS s ON s.id = r.id_style WHERE r.id=".$id;
        $review = $DBase->sendQuery($sql)[0];
        $sql = "SELECT st.*, s.style FROM `sticker` AS st
        LEFT JOIN `styles` AS s ON s.id = st.id_style WHERE st.id_review=".$id;

        $review['sticker']=$DBase->sendQuery($sql);
        return $review;
    }
}