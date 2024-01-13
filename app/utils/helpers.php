<?php  

function dd($data){
     echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}

function sanitize($data){
    return htmlspecialchars($data,ENT_QUOTES|ENT_HTML5,'utf-8');
}

function redirect($to,$params=[]){
    dd($params);
    header("location:$to".".php");

}