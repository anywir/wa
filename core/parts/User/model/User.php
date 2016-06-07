<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 07.06.2016
 * Time: 16:21
 */

namespace model;


class User
{
    /**
     * метод має логінити юзера, створюючи два значення куккі
     * auth - email user
     * token - md5("security_key".email_user)
     *
     * @param string $email - емейл юзера
     * @param string $pass - пароль юзера (не в md5)
     * @return mixed - має повертати true якщо вдалось залогінитись
     * та код помилки, якщо виникла помилка
     * повертає ID користувача
     */

    public function login($login = "",$pass = "")
    {
        $DBase = new DB(null);
        $res =  $DBase->select("user_login",null,["login"=>$login,"password"=>hash("md5",$pass)],null,null,[0,1])[0];
        //print_r($res);
        if ($res)
        {

            setcookie("auth",$res['login'],time()+60*60*24,"/");
            setcookie("token",md5("supersecuritykey".$res['email'].$res['id']),time()+60*60*24,"/");
            setcookie("id",$res['id'],time()+60*60*24,"/");
            return $res['id'];
        }
        else
        {
            return "-1";
        }

    }
    public static function IsTrueUser()
    {
        return (md5("supersecuritykey".$_COOKIE['auth'].$_COOKIE['id'])==$_COOKIE['token']);
    }
}