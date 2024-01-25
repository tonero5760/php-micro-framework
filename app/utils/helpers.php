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



function file_upload($upload)
{
   
    $target_dir = 'uploads/';
    $allowed_size = 1500000; //unit in bytes
    $allowed_types = array('jpg', 'jpeg', 'gif', 'png');
    $error = false;

    if (!is_dir($target_dir)) {
        $target_dir = mkdir('uploads');
    }
    $target_file = $target_dir . time() . basename($upload['name']);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $file_size = $upload['size'];
    $get_img_size = getimagesize($upload["tmp_name"]);

    if (!$get_img_size) {
        $msg = "Error Not a valid image";
        $error = true;
    }

    if ($file_size > $allowed_size) {
        $msg="Error Image size too large";
        $error = true;
    }

    if (!in_array($file_type, $allowed_types)) {
        $msg="Error File type not allowed";
        $error = true;
    }

    if (!$error) {

        if (move_uploaded_file($upload['tmp_name'], $target_file)) {
            return $target_file;
        }
    }

    return $msg;
}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
