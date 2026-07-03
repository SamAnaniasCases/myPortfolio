<?php
/**
 * Public Front Controller
 */

// Initialize bootstrap configuration and autoloader
require_once __DIR__ . '/config/init.php';

// Fetch projects through OOP Model (PDO)
$projectModel = new App\Models\Project();
$projects = $projectModel->all();

// Public page has no administrative privileges
$isAdmin = false;

// Render views using template partials
require_once __DIR__ . '/templates/layouts/header.php';
require_once __DIR__ . '/templates/components/portfolio-view.php';
require_once __DIR__ . '/templates/layouts/footer.php';
?>