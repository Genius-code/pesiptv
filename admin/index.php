<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'boot.php';

//check if Not found session login redirect to login page
if (!isset($_SESSION['login'])) {
    header('location: login');
}

//$page =  $_SERVER['REQUEST_URI'];
//
//$expled = explode('/',$page);
//
//$get = end($expled);

switch ($folder){
    case('/admin_panel/admin/index');
        include __DIR__.('/admin_panel/admin/index.php');
        break;
    case('/admin_panel/admin/dashboard');
        include __DIR__.('/admin_panel/admin/dashboard.php');
        break;
    case('/admin_panel/admin/login');
        include __DIR__.('/admin_panel/admin/login.php');
        break;
    case('/admin_panel/product/index');
        include __DIR__.('/admin_panel/view/product/index.php');
        break;
    case('/admin_panel/view/product/add');
        include __DIR__.('/admin_panel/view/product/add.php');
        break;
    case('/admin_panel/view/product/edit/'.$get);
        include __DIR__.('/admin_panel/view/product/edit.php');
        break;
    case('/admin_panel/handelers/editProduct/'.$get);
        include __DIR__.('/admin_panel/handelers/editProduct.php');
        break;
    case('/admin_panel/handelers/deleteProduct/'.$get);
        include __DIR__.('/admin_panel/handelers/deleteProduct.php');
        break;
    case('/admin_panel/view/message/index');
        include __DIR__.('/admin_panel/view/message/index.php');
        break;
    case('/admin_panel/handelers/deleteMessage/'.$get);
        include __DIR__.('/admin_panel/handelers/deleteMessage.php');
        break;
    case('/admin_panel/view/post/index');
        include __DIR__.('/admin_panel/view/post/index.php');
        break;
    case('/admin_panel/view/post/add');
        include __DIR__.('/admin_panel/view/post/add.php');
        break;
    case('/admin_panel/view/review/index');
        include __DIR__.('/admin_panel/view/review/index.php');
        break;
    case('/admin_panel/handelers/deleteReview/'.$get);
        include __DIR__.('/admin_panel/handelers/deleteReview.php');
        break;
    case('/admin_panel/handelers/approveReview/'.$get);
        include __DIR__.('/admin_panel/handelers/approveReview.php');
        break;
    case('/admin_panel/view/setting/index');
        include __DIR__.('/admin_panel/view/setting/index.php');
        break;
    case('/admin_panel/view/setting/add');
        include __DIR__.('/admin_panel/view/setting/add.php');
        break;
    case('/admin_panel/view/setting/edit/'.$get);
        include __DIR__.('/admin_panel/view/setting/edit.php');
        break;
    case('/admin_panel/handelers/add_data_setting');
        include __DIR__.('/admin_panel/handelers/add_data_setting.php');
        break;
    case('/admin_panel/handelers/edit_data_setting/'.$get);
        include __DIR__.('/admin_panel/handelers/edit_data_setting.php');
        break;
}
