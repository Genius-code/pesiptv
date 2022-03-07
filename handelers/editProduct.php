<?php
session_start();
include '../boot.php';
// Connect to DataBase
include_once '../database/connect.php';
include '../includes/function.php';
include '../includes/validation.php';
global $pdo;
$_SESSION['errors'] = [];
if (isset($_POST['update'])) {

    $id = $_GET['id'];

    create_vars($_POST);

    // validation

    valRequire($product_name,'Product Name',3);

    valRequire($product_duration,'Duration');

    valRequire($product_price,'Price');

    valRequire($product_desc,'Product Description',10);

    check_number($product_price, 'Price');
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
    header('location:'.SITE_URL.'view/product/edit');

    //If Not Found Errors make query update
    if (empty($_SESSION['errors'])) {

        $stmt = $pdo->prepare("UPDATE products SET name= :name,duration= :duration,price= :price,description= :desc WHERE id = :id");
        $stmt->bindParam(":name",$product_name,PDO::PARAM_STR);
        $stmt->bindParam(":duration",$product_duration,PDO::PARAM_STR);
        $stmt->bindParam(":price",$product_price,PDO::PARAM_INT);
        $stmt->bindParam(":desc",$product_desc,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        $_SESSION['success'] = "<strong>Data Updated</strong>";
        header('location:'.SITE_URL.'view/product/index');
    }
}