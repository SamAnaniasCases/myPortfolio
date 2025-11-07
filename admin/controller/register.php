<?php
include __DIR__ . '/../../config/config.php';
include __DIR__ . '/../../config/init.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password

    // Check if email exists
    $check = "SELECT * FROM user_form WHERE email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Email already registered!');
            window.location.href='" . BASE_URL . "admin/views/loginregistration.php';
        </script>";
    } else {
        $sql = "INSERT INTO user_form (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Registration successful! You can now log in.');
                window.location.href='" . BASE_URL . "admin/views/loginregistration.php';
            </script>";
        } else {
            echo "<script>
                alert('Error during registration: " . $conn->error . "');
                window.location.href='" . BASE_URL . "admin/views/loginregistration.php';
            </script>";
        }
    }
}
?>
