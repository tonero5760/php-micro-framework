<?php 

class Session{

    public static function set($name,$value){
        $_SESSION[$name] =$value; 
    }

    public static function exist($name){
        if(isset($_SESSION[$name])){
            return true;
        }
    }

    public static function get($name){
        return $_SESSION[$name];
    }

    public static function pull($name){
        unset($_SESSION[$name]);
        return true;
    }
}