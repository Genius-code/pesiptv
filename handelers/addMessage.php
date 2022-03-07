<?php
session_start();
include '../boot.php';
// Connect to DataBase
include '../database/connect.php';
include '../includes/function.php';
include '../includes/validation.php';
global $pdo;
$_SESSION['errors'] = [];

if (isset($_POST['msg'])) {

    // Variables
    /*
     * $name
     * $email
     * $phone
     * $title
     * $message
     */
    create_vars($_POST);
    //Validation
    valRequire($name,'Name',3);
    valRequire($title,'Title',3);
    valRequire($message,'Message',10);
    check_number($phone,'Phone Number');
    valRequire($email,'Email');
    validEmail($email,'Email');
    //CSRF_TOKEN
    //CSRF TOKEN
    if (isset($_POST['csrf_token'])) {
        if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
            echo 'done';
        } else {
            $_SESSION['errors'][] = 'Problem With CSRF Token Verification';
        }

        //CSRF Token Time Validation
        $max_time = 20*60;
        if (isset($_SESSION['csrf_token_time'])) {
            $token_time = $_SESSION['csrf_token_time'];
            if (($token_time + $max_time) >= time()) {
            } else {
                unset($_SESSION['csrf_token']);
                unset($_SESSION['csrf_token_time']);
                $_SESSION['errors'][] =  "CSRF Token Expired";
            }
        }
    }
    header('location:'.SITE_URL.'contact');
//    show_data($_SESSION);
//    die();
    if (empty($_SESSION['errors'])) {

        $stmt = $pdo->prepare("INSERT INTO messages(name,phone,email,title,content) VALUES (:name,:phone,:email,:title,:content)");
        $stmt->bindParam('name',$name,PDO::PARAM_STR);
        $stmt->bindParam('phone',$phone,PDO::PARAM_INT);
        $stmt->bindParam('email',$email,PDO::PARAM_STR);
        $stmt->bindParam('title',$title,PDO::PARAM_STR);
        $stmt->bindParam('content',$message,PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['success'] = "<strong>Message</strong> Inserted Successfully";
        header('location:'.SITE_URL.'contact');

    }
}