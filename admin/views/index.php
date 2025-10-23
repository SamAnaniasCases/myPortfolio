<?php
include __DIR__ . '/../../config/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiCognito Login</title>

    <!--Main css-->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link rel="stylesheet" href="../../assets/css/logincss.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">

    <!-- https://remixicon.com/ for icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

</head>


<body>
    <section class="secLogin" id="seclogin">
        <div class="loginContainer">

            <!-- ===== LOGIN ===== -->
            <div class="form-box login">
                <form action="<?php echo BASE_URL; ?>admin/controller/login.php" method="POST">
                    <h1>Login</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="name" required>
                        <i class="ri-user-fill"></i>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" required>
                        <i class="ri-lock-2-fill"></i>
                    </div>
                    <div class="forgot-link">
                        <a href="">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btnLogin" name="login">Login</button>
                    <p>or login with social platforms</p>
                    <div class="social-icons">
                        <a href=""><i class="ri-google-fill"></i></a>
                        <a href=""><i class="ri-facebook-circle-fill"></i></a>
                        <a href=""><i class="ri-github-fill"></i></a>
        

                    </div>
                </form>
            </div>




            <!-- ===== REGISTRATION FORM ===== -->

            <div class="form-box register">
                <form action="<?php echo BASE_URL; ?>admin/controller/register.php" method="POST">
                    <h1>Registration</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="name" required>
                        <i class="ri-user-fill"></i>
                    </div>

                    <div class="input-box">
                        <input type="email" placeholder="Email" name="email" required>
                        <i class="ri-mail-fill"></i>   
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" required>
                        <i class="ri-lock-2-fill"></i>
                    </div>
            
                    <button type="submit" class="btnLogin" name="register">Register</button>
                    <p>or register with social platforms</p>
                    <div class="social-icons">
                        <a href=""><i class="ri-google-fill"></i></a>
                        <a href=""><i class="ri-facebook-circle-fill"></i></a>
                        <a href=""><i class="ri-github-fill"></i></a>
        

                    </div>
                </form>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                    <a href="<?php echo BASE_URL; ?>website/index.php">
                        <i class="ri-home-5-line home-left home-button"></i>
                    </a>
                    <h1>Hello, Welcome to <br> your Cogito</h1>
                    <p>Don't have an account?</p>
                    <button class="btnLogin register-btn">Register</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <a href="<?php echo BASE_URL; ?>website/index.php">
                        <i class="ri-home-5-line home-right home-button"></i>
                    </a>
                    <h1>Welcome Back Cogito!</h1>
                    <p>Already have an account?</p>
                    <button class="btnLogin login-btn">Login</button>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo BASE_URL; ?>assets/js/forLogin.js"></script>
    
</body>
</html>