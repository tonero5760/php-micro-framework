<?php

$routes = [
    '/' => 'app/controller/Home.php',
    'register' => 'app/controller/Register.php',
    'login' => 'app/controller/Login.php',
    'contacts' => 'app/controller/Contact.php',
    'about' => 'app/controller/About.php',
];

if (array_key_exists($to, $routes)) {
    require $routes[$to];
} else {
    require 'app/controller/404.php';
}

function redirect($to){
    header("location:$to");
    exit();
}
