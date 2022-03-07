<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';

if (isset($_SESSION['login']))
{
    unset($_SESSION['login']);
    unset($_SESSION);
    session_destroy();
}
header('location:'.SITE_URL.'admin/login');

die();
exit();