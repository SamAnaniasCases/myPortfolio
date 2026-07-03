<?php

namespace App\Middleware;

class AuthMiddleware
{
    /**
     * Verify administrator session for web page access.
     */
    public static function check()
    {
        if (!isset($_SESSION['username'])) {
            // Flash a message to display on the login page
            $_SESSION['flash_error'] = 'You must be logged in to access the dashboard.';
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }
    }

    /**
     * Verify administrator session for API requests.
     */
    public static function checkApi()
    {
        if (!isset($_SESSION['username'])) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'Unauthorized action. Session expired or missing.']);
            exit();
        }
    }
}
