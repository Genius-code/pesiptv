<?php

return [
    'folders' => make_folders()
];



function make_folders()
{
    $folders = glob(realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);
    foreach ($folders as $folder) {
        array_shift($folders);
        $folders[basename($folder)] = $folder;
    }
    return $folders;
}