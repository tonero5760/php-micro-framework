<?php

$pageTitle = "User Dashboard";

if (isset($_POST['new_post'])) {
    $title = sanitize($_POST['title']);
    $category = sanitize($_POST['category']);
    $comment = sanitize($_POST['comment']);

    $post = ['title' => $title,
        'category' => $category,
        'body' => $comment];

       

    $errorList = [];
    $res = isEmpty($post);
    if (is_array($res)) {
        Session::set('title', $res['title']);
        Session::set('category', $res['category']);
        Session::set('comment', $res['body']);
        redirect("post_new");
        exit();
    }

  
    //upload image
    if (isset($_FILES['file'])) {
        $imgUrl = file_upload($_FILES['file']);
        if(str_contains($imgUrl,'Error')){
            Session::set('file',$imgUrl);
            redirect("post_new");
        }
       
    }else{
        $imgUrl = "default.jpg";
    }

   $userId = Session::get('current_user')->id;


    $conn->insert("INSERT INTO posts (title,category,body,img,user_id) VALUES(?,?,?,?,?)",[$post['title'],$post['category'],$post['body'],$imgUrl,$userId]);

     if ($conn->status) {
        $msg = "Post created Successfully!!!";
        Session::set('success', $msg);
        redirect("post_new");

    }
}

require 'public/views/user/view.post.php';
