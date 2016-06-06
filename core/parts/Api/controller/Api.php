<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 12.05.2016
 * Time: 13:37
 */

namespace controller;


class Api
{
    public function __call($name,$arg) 
    {
        $classname="\\controller\\".ucfirst($name);
        $json = null;
        $methodName = "api".$arg[0];
        $this->controller = new $classname();
        if (method_exists($this->controller , $methodName))
        {
            $res = $this->controller->$methodName();
            $json = json_encode($res);
        }
        //header('Content-type: application/json');
        echo $json;

   }

}