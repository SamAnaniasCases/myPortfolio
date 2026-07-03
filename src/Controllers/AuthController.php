<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Handle administrator login requests.
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }

        $name = trim($_POST['name'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($name === '' || $password === '') {
            $_SESSION['flash_error'] = 'Please provide both username and password.';
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }

        $user = $this->userModel->findByName($name);
        $genericError = 'Invalid login credentials.';

        if ($user && password_verify($password, $user['password'])) {
            // Mitigate session hijacking by regenerating session ID
            session_regenerate_id(true);
            $_SESSION['username'] = $user['name'];

            // Redirect to centralized admin router
            header("Location: " . BASE_URL . "admin.php");
            exit();
        } else {
            $_SESSION['flash_error'] = $genericError;
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }
    }

    /**
     * Handle administrator registration requests.
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['register_error'] = 'Please fill in all required fields.';
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }

        // Enforce unique email check
        $existingUser = $this->userModel->findByEmail($email);
        if ($existingUser) {
            $_SESSION['register_error'] = 'Email is already registered!';
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }

        if ($this->userModel->create($name, $email, $password)) {
            $_SESSION['flash_success'] = 'Registration successful! You can now log in.';
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        } else {
            $_SESSION['register_error'] = 'Error during registration. Please try again.';
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }
    }

    /**
     * Handle administrator logout requests.
     */
    public function logout()
    {
        // Unset and destroy the session
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();

        header("Location: " . BASE_URL . "index.php");
        exit();
    }
}
