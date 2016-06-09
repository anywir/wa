<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 06.06.2016
 * Time: 15:10
 */

namespace controller;

use systems\Controller;

class Mainpage extends Controller
{
    public function index()
    {
        $this->model = new \model\Mainpage();
        $data = $this->model->getmain();
        $this->view = new \view\Mainpage();
        $this->view->show($data,false,false);
    }

    public function edit()
    {
        $this->model = new \model\Mainpage();
        $data = $this->model->getmain();
        $edit = false; //заходимо вперше редагувать неможна
        $login = true; //викликається вікно з логіном
        $this->view = new \view\Mainpage();
        
        if(\model\User::IsTrueUser()) //якщо залогінились
        {
            $edit = true;  //можна редагувать
            $login = false;//вікно логіна недоступне
        }
        $this->view->show($data,$edit,$login);

    }
}