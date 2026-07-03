<?php

/**
 * Application Configuration Registry (SSOT)
 */

// Helper function to load .env file
if (!function_exists('loadEnv')) {
    function loadEnv($path)
    {
        if (!file_exists($path)) {
            return;
        }
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Ignore comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            // Parse Key=Value
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);

                // Strip surrounding quotes
                if (preg_match('/^"(.*)"$/', $value, $matches) || preg_match('/^\'(.*)\'$/', $value, $matches)) {
                    $value = $matches[1];
                }

                // Put in environment if not already defined
                if (getenv($name) === false) {
                    putenv("{$name}={$value}");
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}

// Load environment variables from the root .env file
loadEnv(__DIR__ . '/../.env');

// Retrieve environment variables with clean defaults
$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbName = getenv('DB_NAME') ?: 'project2_db';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$dbPort = getenv('DB_PORT') ?: '3306';
$baseUrl = getenv('BASE_URL') ?: 'http://localhost:8080/myPortfolio/';

// Return config array (SSOT)
$config = [
    'db' => [
        'host'     => $dbHost,
        'dbname'   => $dbName,
        'username' => $dbUser,
        'password' => $dbPass,
        'port'     => (int)$dbPort,
    ],
    'app' => [
        'base_url' => $baseUrl,
        'name'     => 'Sam Cases Portfolio',
    ]
];

// BACKWARD COMPATIBILITY SHIM (for legacy controllers still using mysqli)
// This will be removed once Controllers are fully refactored.
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, (int)$dbPort);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $config;
