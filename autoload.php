<?php include_once 'boot.php';

$core = glob(CORE_PATH . '*.php');
$data = glob(DATA_PATH . '*.php');
$ajax = glob(AJAX_PATH . '*.php');

foreach ($core as $file) {
    require_once $file;
}

foreach ($data as $file) {
    require_once $file;
}