<?php
require_once './Connect.php';
require_once './helpers.php';
require_once './validate.php';

if (isset($_POST['register'])) {
    
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $confirm = sanitize($_POST['confirm']);

    $userDetails = ['username' => $username, 'email' => $email, 'password' => $password, 'confirm' => $confirm];

    $errorList = [];
    $res = isEmpty($userDetails);
    if (is_array($res)) {

        header("location:register.php?username=" . $res['username'] . "&&email=" . $res['email'] . "&&password=" . $res['password']);
        exit();

    }

    if (!isPasswordMatch($userDetails['password'], $userDetails['confirm'])) {
        $msg = "Password does not match";
        header("location:register.php?password=" . $msg);
        exit();

    }

    if (!inputLength($userDetails['username'])) {
        $msg = "Username too short";
        header("location:register.php?username=" . $msg);
        exit();

    }

    $res = $conn->select("SELECT * FROM users WHERE username=?", [$userDetails['username']])->fetchAll();

    if ($res) {
        $msg = "User Already exists";
        header("location:register.php?username=" . $msg);
        exit();

    }

    $hashedPass = password_hash($userDetails['password'], PASSWORD_DEFAULT);

    $conn->insert("INSERT INTO users (username,email,password) VALUES (?,?,?)", [$userDetails['username'], $userDetails['email'], $hashedPass]);

    if ($conn->status) {
        $msg = "Registeration Successful!!!";
        header("location:login.php?success=" . $msg);
        exit();
    }

    $msg = "Registeration Failed, Try again...!!!";
    header("location:register.php?danger=" . $msg);
    exit();

}

if (isset($_POST['login'])) {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    $userDetails = ['email' => $email, 'password' => $password];

    $errorList = [];
    $res = isEmpty($userDetails);
    if (is_array($res)) {

        header("location:login.php?email=" . $res['email'] . "&&password=" . $res['password']);
        exit();

    }

    $res = $conn->select("SELECT * FROM users WHERE email=?", [$userDetails['email']])->fetchAll();

    if (!$res) {
        $msg = "User does not exist";
        header("location:login.php?danger=" . $msg);
        exit();

    }

    if (!password_verify($userDetails['password'], $res[0]['password'])) {
        $msg = "Email or password incorrect.";
        header("location:login.php?danger=" . $msg);
        exit();

    }

    $_SESSION['current_user'] = $res;
    header("location:dashboard.php");
    exit();

}

if (isset($_POST['logout'])) {

    unset($_SESSION['current_user']);

    session_destroy();
    header("location:index.php");
    exit();
}
