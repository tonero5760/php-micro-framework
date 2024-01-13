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

        Session::set('username',$res['username']);
        Session::set('email',$res['email']);
        Session::set('password',$res['password']);
        Session::set('confirm',$res['confirm']);
        header("location:register");

        // header("location:register?username=" . $res['username'] . "&&email=" . $res['email'] . "&&password=" . $res['password']);
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


require 'public/views/guest/view.register.php';
