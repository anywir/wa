<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 22.06.2016
 * Time: 16:19
 */

namespace controller;


class Review
{
    public function apiupdate()
    {
        /*POST*/
        $id = $_POST['id'];
        $tema = $_POST['tema'];
        $text = $_POST['text'];
        $date = $_POST['date'];
        $id_autor = 1;
        $this->model = new \model\Review();
        if ($id=='new')
        {
            return $this->model->add($tema, $text, $id_autor, $date);
        }
        else
        {
            return $this->model->update($id, $tema, $text, $id_autor, $date);
        }

    }
}