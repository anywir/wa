<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 30.06.2016
 * Time: 15:24
 */

namespace controller;


class Style
{
    public function apigetstyles()
    {
        $type_blck = $_GET("block");
        $this->model = new \model\Style();
        return $this->model->getstyles($type_blck);
    }
    public function apigetblocks()
    {

        $this->model = new \model\Style();
        return $this->model->getblocks();
    }
}