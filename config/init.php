<?php

/**
 * Application Bootstrap and Autoloader
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

// Load configuration
$config = require __DIR__ . '/config.php';

// Load unified database PDO class
require_once __DIR__ . '/Database.php';

// Dynamically set BASE_URL based on environment
$baseUrl = $config['app']['base_url'];
define('BASE_URL', $baseUrl);

// Register PSR-4 Autoloader for namespace "App" mapping to "/src"
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // Move to next registered autoloader
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});
