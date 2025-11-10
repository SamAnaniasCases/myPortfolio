<?php
session_start();
include __DIR__ . '/../../config/config.php';
include __DIR__ . '/../../config/init.php';

if (isset($_POST['login'])) {
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || $password === '') {
        $_SESSION['flash_error'] = 'Please provide both username and password.';
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, name, password FROM user_form WHERE name = ?");
    if ($stmt === false) {
        error_log('DB prepare failed: ' . $conn->error);
        $_SESSION['flash_error'] = 'An internal error occurred. Please try again later.';
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();
    }

    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();

    $genericError = 'Invalid login credentials.';

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            session_regenerate_id(true);
            $_SESSION['username'] = $user['name'];
 
            header("Location: " . BASE_URL . "admin/index.php");
            exit();
        } else {
 
            $_SESSION['flash_error'] = $genericError;
            header("Location: " . BASE_URL . "admin/views/loginregistration.php");
            exit();
        }
    } else {

        $_SESSION['flash_error'] = "Invalid login credentials.";
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();

    }
}
?>
