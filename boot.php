<?php
include_once __DIR__.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';

$folders = [
    'core' => glob(CORE_PATH.'*.php'),
    'data' => glob(DATA_PATH.'*.php')
];

function autoload(array $folders)
{
    foreach ($folders as $folder) {
        foreach ($folder as $file) {
            require_once $file;
        }
    }
}