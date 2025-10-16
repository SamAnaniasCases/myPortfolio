<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_form WHERE name='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['name'];
            header("Location: myPortfolio.html");
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='index.php';</script>";
    }
}
?>
