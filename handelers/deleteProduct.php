<?php

session_start();
include '../boot.php';
// Connect to DataBase
include '../database/connect.php';
global $pdo;
$_SESSION['errors']= [];

if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {

        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = $id");
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0){
            $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $_SESSION['success'] = "<strong>Data</strong> Deleted Successfully";
            header('location:'.SITE_URL.'view/product/index');
        }
}

    
