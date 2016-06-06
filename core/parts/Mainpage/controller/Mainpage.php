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
        $this->view = new \view\Mainpage();
        $this->view->show();
    }
}