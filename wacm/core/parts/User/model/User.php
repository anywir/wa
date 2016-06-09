<?php


namespace model;

use systems\DB;

class User
{

    public function login($login = "",$pass = "")
    {
        $DBase = DB::getInstance();
        $res =  $DBase->select("user_login",null,["login"=>$login,"password"=>hash("md5",$pass)],null,null,[0,1])[0];
        //print_r($res);
        if ($res)
        {

            setcookie("auth",$res['login'],time()+60*60*24,"/");
            setcookie("token",md5("supersecuritykey".$res['login'].$res['id']),time()+60*60*24,"/");
            setcookie("id",$res['id'],time()+60*60*24,"/");
            return $res['id'];
        }
        else
        {
            return "-1";
        }

    }

    public static function logout()
    {
        setcookie("auth","",time()-600,"/");
        setcookie("token","",time()-600,"/");
        setcookie("id","",time()-600,"/");
        return true;
    }

    public static function IsTrueUser()
    {
        return (md5("supersecuritykey".$_COOKIE['auth'].$_COOKIE['id'])==$_COOKIE['token']);
    }
}