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
        $edit = false; //�������� ������ ���������� �������
        $login = true; //����������� ���� � ������
        $this->view = new \view\Mainpage();
        
        if(\model\User::IsTrueUser()) //���� �����������
        {
            $edit = true;  //����� ����������
            $login = false;//���� ����� ����������
        }
        $this->view->show($data,$edit,$login);

    }
}