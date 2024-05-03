<?php

function handleDirectory($directoryPath, $directoryName, $operation = 'read') {
    $fullPath = rtrim($directoryPath, '/') . '/' . $directoryName;

    switch ($operation) {
        case 'read':
            if (is_dir($fullPath)) {
                $files = scandir($fullPath);
                return implode(', ', $files);
            } else {
                return 'Directory does not exist.';
            }
        case 'delete':
            if (is_dir($fullPath) && !(new FilesystemIterator($fullPath))->valid()) {
                rmdir($fullPath);
                return 'Directory deleted.';
            } else {
                return 'Directory does not exist or is not empty.';
            }
        case 'create':
            if (!is_dir($fullPath)) {
                mkdir($fullPath);
                return 'Directory created.';
            } else {
                return 'Directory already exists.';
            }
        default:
            return 'Invalid operation.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $directoryPath = $_POST['directoryPath'];
    $directoryName = $_POST['directoryName'];
    $operation = $_POST['operation'];
    $result = handleDirectory($directoryPath, $directoryName, $operation);
    echo $result;
}
