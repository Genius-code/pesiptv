<?php
session_start();
include '../boot.php';
// Connect to DataBase
include '../database/connect.php';
include '../includes/function.php';
include '../includes/validation.php';
global $pdo;
$_SESSION['errors'] = [];
if (isset($_POST['update'])) {

    $id = $_GET['id'];

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
//    show_data($_POST);
//    die();
    // validation

    valRequire($site_name,'Site Name');
    checkMinLenght($site_name,'Site Name',3);
    header('location:'.SITE_URL.'view/setting/edit');

    //If Not Found Errors make query update
    if (empty($_SESSION['errors'])) {

        $stmt = $pdo->prepare("UPDATE settings SET siteName= :name,facebook= :facebook,instagram= :instagram,youtube= :youtube,telegram= :telegram,phoneNumber= :phone,email= :email,address= :address WHERE id = :id");
        $stmt->bindParam(":name",$site_name,PDO::PARAM_STR);
        $stmt->bindParam(":facebook",$face_link,PDO::PARAM_STR);
        $stmt->bindParam(":instagram",$insta_link,PDO::PARAM_STR);
        $stmt->bindParam(":youtube",$youtube_link,PDO::PARAM_STR);
        $stmt->bindParam(":telegram",$tele_link,PDO::PARAM_STR);
        $stmt->bindParam(":phone",$phone_num,PDO::PARAM_INT);
        $stmt->bindParam(":email",$email_link,PDO::PARAM_STR);
        $stmt->bindParam(":address",$address_link,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['success'] = "<strong>Data Updated</strong>";
        header('location:'.SITE_URL.'view/setting/index');
    }
}