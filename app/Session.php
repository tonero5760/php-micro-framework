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

    public static function get(){

    }

    public static function pull(){

    }
}