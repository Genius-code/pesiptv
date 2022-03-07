<?php

$folders = include_once 'env.php';

// Directory System Separator
define('DS', DIRECTORY_SEPARATOR);

// Application Path
define('APPLICATION_PATH', realpath(__DIR__ . '\\..\\'));

// Create Absolute Path for every folder in Project
make_configration_constants($folders['folders']);

// Website Urls

// Site Url
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . get_script_name() . '/');

// Frontend  Url
define('FRONTEND_URL', SITE_URL . 'assets/front/');

// Backend  Url
define('BACKEND_URL', SITE_URL . 'assets/backend/');

function get_script_name(string $script_name = '')
{
    if (empty($script_name)) {
        if (! empty($_SERVER['SCRIPT_NAME'])) {
            $data = ltrim($_SERVER['SCRIPT_NAME'],'/');
            $data = explode('/',$data);
            return $data[0];
        }
    } else {
        return $script_name;
    }
}
//function get_script_name()
//{
//    if (!empty($_SERVER['SCRIPT_NAME'])) {
//
//        return str_replace("/", "", dirname($_SERVER['SCRIPT_NAME']));
//    }
//}

function make_configration_constants(array $folders)
{
    foreach ($folders as $key => $folder) {
        define(strtoupper($key) . '_PATH', $folder . DS);
    }
}
