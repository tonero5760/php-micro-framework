<?php

$routes = [
    '/' => 'app/controller/Home.php',
    'home' => 'app/controller/Home.php',
    'register' => 'app/controller/Register.php',
    'login' => 'app/controller/Login.php',
    'contacts' => 'app/controller/Contact.php',
    'about' => 'app/controller/About.php',
    'dashboard' => 'app/controller/Dashboard.php',
    'logout' => 'app/controller/Logout.php',
    'post_new'=>'app/controller/Post.php'
];

$restricted_route = [
    'dashboard' => 'app/controller/Dashboard.php',
    'register' => 'app/controller/Register.php',
    'login' => 'app/controller/Login.php',

];

if (array_key_exists($to, $routes)) {
    if (!Session::exist('isLoggedIn') && 
    $to == 'dashboard') {
        redirect('login');
    }

    if (Session::exist('isLoggedIn') && ($to == 'login' || $to == 'register')) {
    redirect('dashboard');
    }



    require $routes[$to];
} else {
    require 'app/controller/404.php';
}

function redirect($to)
{
    header("location:$to");
    exit();
}
