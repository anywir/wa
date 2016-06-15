<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 03.06.2016
 * Time: 15:27
 */

namespace controller;


    class News
    {
        public function test()
        {
            echo "OK";
        }

        public function apitest()
        {
            return "test API - OK";
        }

        public function apiupdate()
        {
            /*POST*/
            $id = $_POST['id'];
            $tema = $_POST['tema'];
            $text = $_POST['text'];
            $date = $_POST['date'];
            $id_autor = 1;
            $this->model = new \model\News();
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
