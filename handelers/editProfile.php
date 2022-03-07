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


    //Variables
    /*
     * $name
     * $email
     * $password
     * $new_password
     */
    create_vars($_POST);
    valRequire($name,'UserName',3);//Function validate check if empty username and length

    valRequire($email,'Email'); //Function validate check if empty email

    validEmail($email,'Email'); //Function validate email check email or Not

    valRequire($new_password,'New Password',10); //Function validate check if empty and length
    header('location:'.SITE_URL.'admin/profile');

    $hash = sha1($new_password);

    //If Not Found Errors make query update
    if (empty($_SESSION['errors'])) {

        $stmt = $pdo->prepare("UPDATE users SET user_name= :name,email= :email,password= :hash WHERE id = 1");
        $stmt->bindParam(":name",$name,PDO::PARAM_STR);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->bindParam(":hash",$hash,PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['success'] = "<strong>Data Updated</strong>";
        header('location:'.SITE_URL.'admin/profile');
    }

}