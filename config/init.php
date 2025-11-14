<?php
if (session_status() == PHP_SESSION_NONE) session_start();

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

if (strpos($host, 'localhost') !== false) {
    $host .= '/myPortfolio/';
} else {

    $host .= '/';
}

define('BASE_URL', $protocol . $host);
?>
