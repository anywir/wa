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
        $review = \model\Review::get('1');
        $sections = \model\Section::get(1);
        $data['news']=$news;
        $data['review']=$review;
        $data['secctions']=$sections;
        echo "<pre>";
        print_r($data);
        return $data;
    }


}