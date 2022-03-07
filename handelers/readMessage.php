<?php
session_start();
include '../boot.php';
// Connect to DataBase
include '../database/connect.php';
include '../includes/function.php';
include '../includes/validation.php';
global $pdo;
$_SESSION['errors'] = [];
if (isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];


    $stmt = $pdo->prepare("SELECT * FROM messages WHERE id= :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->fetchAll();
    $count = $stmt->rowCount();

    if ($count > 0) {

        $stmt = $pdo->prepare("UPDATE messages SET status ='read' WHERE id= $id");
        $stmt->execute();
        $stmt->fetchAll();
        $_SESSION['success'] = "<strong>Read done successfully</strong>";
        header('location:' . SITE_URL . 'view/message/index');
    }

}
