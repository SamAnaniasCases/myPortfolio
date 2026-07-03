<?php
/**
 * Admin Front Controller and Router
 */

// Initialize bootstrap configuration and autoloader
require_once __DIR__ . '/config/init.php';

$action = $_GET['action'] ?? null;

if ($action) {
    if ($action === 'login') {
        (new App\Controllers\AuthController())->login();
    } elseif ($action === 'register') {
        (new App\Controllers\AuthController())->register();
    } elseif ($action === 'logout') {
        (new App\Controllers\AuthController())->logout();
    } else {
        // Project CRUD actions mapping
        if ($action === 'create-project') {
            $_GET['action'] = 'create';
        } elseif ($action === 'update-project') {
            $_GET['action'] = 'update';
        } elseif ($action === 'delete-project') {
            $_GET['action'] = 'delete';
        } elseif ($action === 'show-project') {
            $_GET['action'] = 'show';
        }
        
        // Execute project controller endpoint handler
        (new App\Controllers\ProjectController())->handle();
    }
} else {
    // Render administrative dashboard page
    // Enforce session access control checks
    App\Middleware\AuthMiddleware::check();

    // Fetch projects using models layer
    $projectModel = new App\Models\Project();
    $projects = $projectModel->all();

    // Enable administrative UI components (CRUD edit/delete actions, modals) in view templates
    $isAdmin = true;

    // Load view fragments
    require_once __DIR__ . '/templates/layouts/header.php';
    require_once __DIR__ . '/templates/components/portfolio-view.php';
    require_once __DIR__ . '/templates/layouts/footer.php';
}
?>
