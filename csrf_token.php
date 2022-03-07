<?php

// Create token
global $token;
$token = md5(uniqid(rand(),true));
//save token in session
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();

//CSRF Token Validation

//if (isset($_POST['csrf_token'])) {
//    if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
//    } else {
//        $_SESSION['errors'][] = 'Problem With CSRF Token Verification';
//    }
//
//    //CSRF Token Time Validation
//    $max_time = 60*60*24;
//    if (isset($_SESSION['csrf_token_time'])) {
//        $token_time = $_SESSION['csrf_token_time'];
//        if (($token_time + $max_time) >= time()) {
//        } else {
//            unset($_SESSION['csrf_token']);
//            unset($_SESSION['csrf_token_time']);
//            $_SESSION['errors'][] =  "CSRF Token Expired";
//        }
//    }
//}