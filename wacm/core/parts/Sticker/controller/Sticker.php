<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 15.08.2016
 * Time: 12:01
 */

namespace controller;


class Sticker
{
    public function apiupdate()
    {
        /*POST*/
        $id = $_POST['id'];
        $sign = $_POST['sign'];
        $text = $_POST['text'];
        $id_style = $_POST['style'];
        $id_review = $_POST['id_review'];

        $this->model = new \model\Sticker();
        if ($id=='new')
        {
            return $this->model->add($sign, $text, $id_review, $id_style);
        }
        else
        {
            return $this->model->update($id, $sign, $text, $id_review, $id_style);
        }

    }
}