<?php
include __DIR__ . '/../../config/config.php';
include __DIR__ . '/../../config/init.php';

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['register_error'] = 'Please fill in all required fields.';
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id FROM user_form WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO user_form (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['flash_success'] = 'Registration successful! You can now log in.';
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();
    } else {
        $_SESSION['register_error'] = 'Error during registration. Please try again.';
        header("Location: " . BASE_URL . "admin/views/loginregistration.php");
        exit();
    }
}
?>
