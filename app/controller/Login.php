<?php 
$pageTitle = "Login to Continue.";

if (isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    $userDetails = ['email' => $email, 'password' => $password];

    $errorList = [];
    $res = isEmpty($userDetails);
    if (is_array($res)) {

        redirect("login");

    }

    $res = $conn->select("SELECT * FROM users WHERE email=?", [$userDetails['email']])->fetchAll();

    if (!$res) {
        $msg = "User does not exist";
        Session::set('fail',$msg);
        redirect("login");
    }

    if (!password_verify($userDetails['password'], $res[0]['password'])) {
        $msg = "Email or password incorrect.";
        Session::set('fail',$msg);
        redirect("login");
      

    }

    Session::set('current_user',$res);
    Session::set('isLoggedIn',true);
    redirect('dashboard');
  

}

require 'public/views/guest/view.login.php';
