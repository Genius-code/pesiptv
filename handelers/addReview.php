<?php
session_start();
include '../boot.php';
// Connect to DataBase
include '../database/connect.php';
include '../includes/function.php';
include '../includes/validation.php';
global $pdo;

$_SESSION['errors'] = [];

if (isset($_POST['review'])) {

   // variable
    /*
     * $name_review
     * $email_review
     * $comment_review
     */
    create_vars($_POST);

    // validation

    valRequire($name_review,'name',3);//Function validate check if empty username and length

    valRequire($email_review,'Email'); //Function validate check if empty email

    validEmail($email_review,'Email'); //Function validate email check email or Not

    valRequire($comment_review,'Comment',10); //Function validate check if empty and length

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
    header('location:'.SITE_URL.'review');

    // after check if $_SESSION['errors'] Not empty make connection and Insert data
    if (empty($_SESSION['errors'])) {

        $stmt = $pdo->prepare("INSERT INTO reviews(name,email,comment) VALUES(:name,:email,:comment)");
                    $stmt->bindParam("name",$name_review,PDO::PARAM_STR);
                    $stmt->bindParam("email",$email_review,PDO::PARAM_STR);
                    $stmt->bindParam("comment",$comment_review,PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['success'] = "<strong>Comment</strong> Inserted Successfully";
        header('location:'.SITE_URL.'review');

    }

}