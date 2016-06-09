<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 06.06.2016
 * Time: 17:37
 */

namespace controller;

use systems\Controller;

class User extends Controller
{
    public function login()
    {
        
    }

    public function apilogin()
    {
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];
        $this->model = new \model\User();
        $isUser = $this->model->login($login,$passwd);
        $res = ["id"=>$isUser];
        return $res;
    }

    public function index()
    {
        
    }

    public function logout()
    {
        \model\User::logout();
        header("Refresh:1;url=".SITE);
    }
}