<?php
if (session_status() == PHP_SESSION_NONE) session_start();

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

// If running locally (e.g. localhost), include your folder
if (strpos($host, 'localhost') !== false) {
    $host .= '/myPortfolio/';
} else {
    // On Wasmer (or any live server), use root path
    $host .= '/';
}

define('BASE_URL', $protocol . $host);
?>
