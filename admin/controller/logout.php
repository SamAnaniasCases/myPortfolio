<?php
session_start();
session_unset();
session_destroy();

// Redirect back to website homepage
include __DIR__ . '/../../config/config.php';
include __DIR__ . '/../../config/init.php';
header("Location: " . BASE_URL . "");
exit();
?>
