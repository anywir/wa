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
        $review = \model\Review::get();
        $sections = \model\Section::get();
        $data['news']=$news;
        $data['review']=$review;
        $data['sections']=$sections;
/*        echo "<pre>";
        print_r($data);*/
        return $data;
    }


}