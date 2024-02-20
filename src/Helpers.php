<?php

function response($success, $data, $error){
    return [
        'success' => $success,
        'data' => $data,
        'error' => $error,
    ];
}

function dd($content){
    echo '<pre>';
    print_r($content);
    echo '</pre>';
    die;
}