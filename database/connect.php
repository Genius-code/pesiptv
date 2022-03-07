<?php

//Connect to Database
try{
    global $pdo;
    $pdo = @new PDO('mysql:host=localhost;dbname=k-tv;charset=utf8','root','',[
        PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
}catch(PDOException $e){
    die($e->getMessage());
}