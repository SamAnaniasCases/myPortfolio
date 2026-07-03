<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">

    <!-- Sub css -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/experience.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/contact.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/portfolio.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/resume.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/animations.css">

    <!-- Icon Font (Remix Icon) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>

    <title><?php echo htmlspecialchars($config['app']['name'] ?? 'MiCogito'); ?></title>
</head>
<body id="idbody">
    <header class="header">
        <a href="<?php echo BASE_URL; ?>#home" class="logo"><span>Mi Cogito</span></a>
        
        <div class="nav-btn-container container" id="nav-btn-container">
            <i class="ri-code-s-slash-line left-logo hlogo"></i>

            <ul class="nav-btn" id="nav-btn">
                <li><a href="<?php echo BASE_URL; ?>#home">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>#about">About</a></li>
                <li><a href="<?php echo BASE_URL; ?>#experience">Experience</a></li>
                <li><a href="<?php echo BASE_URL; ?>#portfolio">Projects</a></li>
                <li><a href="<?php echo BASE_URL; ?>#contacts">Contacts</a></li>
            </ul>

            <i class="ri-folder-fill hlogo right-logo"></i>
        </div>

        <i class="ri-menu-line" id="menu-icon"></i>

        <button class="dlmode" id="dlmode">
            <i class="ri-moon-clear-line"></i>
            <i class="ri-sun-fill"></i>
        </button>

        <div class="log-in">
            <?php if (isset($_SESSION['username'])): ?>
                <a href="<?php echo BASE_URL; ?>admin/controller/logout.php" class="logout-link">
                    <i class="ri-user-line"></i>
                    <span> | Logout</span>
                </a>
            <?php else: ?>
                <a href="<?php echo BASE_URL; ?>admin/views/loginregistration.php">
                    <i class="ri-user-line"></i>
                    <button class="loginbtn">Login</button>
                </a>
            <?php endif; ?>
        </div>
    </header>
    <main class="main">
