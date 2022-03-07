<?php
session_start();
include '../boot.php';
// Connect to DataBase
include_once '../database/connect.php';
include '../includes/function.php';
include '../includes/validation.php';
global $pdo;
$_SESSION['errors'] = [];
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    //Variables
    /*
     * $site_name
     * $face_link
     * $insta_link
     * $youtube_link
     * $tele_link
     * $phone_num
     * $email_link
     * $address_link
     */
    create_vars($_POST);

    // validation

    valRequire($site_name,'Site Name',3);

    valRequire($face_link,'FaceBook Account',3);

    valRequire($phone_num,'Phone Number',3);

    valRequire($email_link,'Email Address');

    valRequire($address_link,'Address',3);

    //CSRF TOKEN
    if (isset($_POST['csrf_token'])) {
        if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
            echo 'done';
        } else {
            $_SESSION['errors'][] = 'Problem With CSRF Token Verification';
        }

        //CSRF Token Time Validation
        $max_time = 20;
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
    header('location:'.SITE_URL.'view/setting/add');


//show_data($_SESSION['errors']);


    if (empty($_SESSION['errors'])) {

        $stmt = $pdo->prepare("INSERT INTO settings(siteName,facebook,instagram,youtube,telegram,phoneNumber,email,address) VALUES(:siteName,:facebook,:instagram,:youtube,:telegram,:phoneNumber,:email,:address)");
        //            $stmt->bindParam("name",$product_name);
        //            $stmt->bindParam("price",$product_price);
        //            $stmt->bindParam("description",$product_desc);
        $stmt->execute([
            'siteName'          => $site_name,
            'facebook'          => $face_link,
            'instagram'         => $insta_link,
            'youtube'           => $youtube_link,
            'telegram'          => $tele_link,
            'phoneNumber'       => $phone_num,
            'email'             => $email_link,
            'address'           => $address_link
        ]);
        $_SESSION['success'] = "<strong>Data</strong> Inserted Successfully";
        header('location:'.SITE_URL.'view/setting/add');

    }

}
