<?php
$pageTitle = "User Registeration";

if (isset($_POST['register'])) {

    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $confirm = sanitize($_POST['confirm']);

    $userDetails = ['username' => $username, 'email' => $email, 'password' => $password, 'confirm' => $confirm];

    $errorList = [];
    $res = isEmpty($userDetails);
    if (is_array($res)) {

        Session::set('username', $res['username']);
        Session::set('email', $res['email']);
        Session::set('password', $res['password']);
        Session::set('confirm', $res['confirm']);

        redirect("register");

        // header("location:register?username=" . $res['username'] . "&&email=" . $res['email'] . "&&password=" . $res['password']);

    }

    if (!isPasswordMatch($userDetails['password'], $userDetails['confirm'])) {
        $msg = "Password does not match";
        redirect("register");

    }

    if (!inputLength($userDetails['username'])) {
        $msg = "Username too short";
        redirect("redirect");

    }

    $res = $conn->select("SELECT * FROM users WHERE username=?", [$userDetails['username']])->fetchAll();

    if ($res) {
        $msg = "User Already exists";
        Session::set('fail', $msg);
        redirect("register");
        exit();

    }

    $hashedPass = password_hash($userDetails['password'], PASSWORD_DEFAULT);

    $conn->insert("INSERT INTO users (username,email,password) VALUES (?,?,?)", [$userDetails['username'], $userDetails['email'], $hashedPass]);

    if ($conn->status) {
        $msg = "Registeration Successful!!!";
        Session::set('success', $msg);
        redirect("login");

    }

    $msg = "Registeration Failed, Try again...!!!";
    Session::set('fail', $msg);
    redirect("register");
    exit();

}

require 'public/views/guest/view.register.php';
