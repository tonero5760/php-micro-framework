<?php 

 $res = $conn->select("SELECT * FROM posts")->fetchAll();

 $res = json_decode(json_encode($res));




require 'public/views/guest/view.home.php';