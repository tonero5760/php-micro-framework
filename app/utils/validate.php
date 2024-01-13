<?php

function isEmpty($data)
{
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $errorList[$key] = $key . " field is empty";
            }

        }

        if (!empty($errorList)) {
            return $errorList;
        }

    }
    return true;
}

function isPasswordMatch($pass,$confirm){
    if($pass != $confirm){
        return false;
    }
    return true;
}

function inputLength($data,$len=4){
    if(strlen($data) < $len){
        return false;
    }
    return true;
}
