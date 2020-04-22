<?php

spl_autoload_register(function ($className) {
    $className = __DIR__ . '/' . str_replace(['Application', '\\'], ['src', '/'], $className) . '.php';


    if (file_exists($className)) {
        require_once $className;
    }
});
