<?php
include __DIR__ . '/config/init.php';

require_once __DIR__ . '/admin/model/project.php';
$project = new Project();
$projects = $project->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">

    <!--Main css-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">

    <!--Sub css-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/experience.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/contact.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/portfolio.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/resume.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/animations.css">


    <!-- https://remixicon.com/ for icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    
    <!--swiperjs for swipe-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>

    <title>MiCogito</title>

</head>
<body id="idbody">
    <header class="header">
        <a href="#home" class="logo"><span>Mi Cogito</span></a>
        
        <div class="nav-btn-container container" id="nav-btn-container">
            <i class="ri-code-s-slash-line left-logo hlogo"></i>

            <ul class="nav-btn" id="nav-btn">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#portfolio">Projects</a></li>
                <li><a href="#contacts">Contacts</a></li>
            </ul>

            <i class="ri-folder-fill hlogo right-logo"></i>
        </div>

        <i class="ri-menu-line" id="menu-icon"></i>

        <button class="dlmode" id="dlmode">
            <i class="ri-moon-clear-line"></i>
            <i class="ri-sun-fill"></i>
        </button>

        <div class="log-in">
        <a href="<?php echo BASE_URL; ?>admin/views/loginregistration.php">
        <i class="ri-user-line"></i>
        <button class="loginbtn">Login</button>
        </a>
        </div>
    </header>
    
    <main class="main">
    
    <section class="home section" id="home">
        <div class="home-container container">
            <div class="home-content">
                <div class="dice">
                    <div class="roll" type="button">
                        <div class="dice-wrapper reveal-scale reveal-onload reveal-delay-1">
                            <div class="dice-bounce-container">
                                <div class="dice-container">
                                    <div class="face front">
                                        <span class="pip"></span>
                                    </div>
                                    <div class="face back">
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                    </div>
                                    <div class="face top">
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                    </div>
                                    <div class="face bottom">
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                    </div>
                                    <div class="face right">
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                    </div>
                                    <div class="face left">
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                        <span class="pip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dice-shadow"></div>
                        </div>
                    </div>
                        <h3 class="word-display reveal-up reveal-onload reveal-delay-2">Hello!</h3>
                        <h3 class="short-tagline reveal-up reveal-onload reveal-delay-3">Let’s make something amazing together.</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== ABOUT SECTION ===== -->

    <section class="about" id="about">
        <div class="about-container">
            <img src="<?php echo BASE_URL; ?>assets/images/SAM.jpg" class="reveal-left" alt="confusedmf">

            <div class="about-info">

                <div class="about-txt reveal-up reveal-delay-1">
                    <h3>Hi, I'm</h3>
                    <h1>Sam Cases</h1>
                    <span>Web Developer</span>
                </div>

                <div class="about-btn reveal-up reveal-delay-2">

                    <div class="btn"><a href="" id="openResume">Read More</a></div>
                    <div class="btn"><a href="#contacts">Contacts</a></div>
                </div>

                <div class="about-socials reveal-up reveal-delay-3">
                    <a href="https://github.com/SamAnaniasCases" target="_blank"><i class="ri-github-fill"></i></a>
                    <a href="https://www.facebook.com/samananias.cases" target="_blank"><i class="ri-facebook-circle-fill"></i></a>

                </div>
            </div>
        </div>
    </section>


    <!-- ===== RESUME READ MORE ===== -->
    
    <section class="sue-section nav-menu-section" id="resume">

        <div class="resume-modal" id="resumeModal">
            <div class="resume-modal-content">
                <span class="close-resume">&times;</span>


        <div class="sue-container sue-sub-container">
            <div class="sue-wrapper">
                    <h3 class="section-title" data-title="Combination of Skills & Experience">My Resume</h3> 
            </div>
            <div class="resume-tabs">
                <a class="tab-btn active"><i class="ri-graduation-cap-line"></i>Education</a>
                <a class="tab-btn"><i class="ri-sparkling-line"></i>Experience</a>
                <a class="tab-btn"><i class="ri-user-settings-line"></i>Personal Skills</a>
            </div>
            <div class="section-content">
                <div class="resume-tab-content education active">
                    <div class="resume-line"></div>
                    <div class="resume-items">

                    <div class="item item-left">
                        <div class="info">
                            <i class="ri-graduation-cap-fill"></i>
                            <div>
                                <h5>Simeon Ayuda Elementary School</h5>
                                <p>Liloan, Cebu</p>
                                <span>2010-2016</span>
                            </div>
                        </div>
                    </div>

                    <div class="item item-right">
                        <div class="info">
                            <i class="ri-graduation-cap-fill"></i>
                            <div>
                                <h5>Arcelo Memorial National HS</h5>
                                <p>Liloan, Cebu</p>
                                <span>2016-2022</span>
                            </div>
                        </div>
                    </div>

                    <div class="item item-left">
                        <div class="info">
                            <i class="ri-graduation-cap-fill"></i>
                            <div>
                                <h5>Cebu Technological University</h5>
                                <p>Danao, Cebu</p>
                                <span>2022-2026</span>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="resume-tab-content experience">
                    <div class="resume-line"></div>
                    <div class="resume-items">

                    <div class="item item-left">
                        <div class="info">
                            <i class="ri-sparkling-fill"></i>
                            <div>
                                <h5>Work Immersion : Animation</h5>
                                <p>Liloan, Cebu</p>
                                <span>2021-2022</span>
                            </div>
                        </div>
                    </div>

                     <div class="item item-right">
                        <div class="info">
                            <i class="ri-sparkling-fill"></i>
                            <div>
                                <h5>TESDA : Web Design</h5>
                                <p>Danao, Cebu</p>
                                <span>2024-2025</span>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="resume-tab-content personal-skills">
                    <div class="skill-container">

                        <div class="skill-card">
                            <div class="skill-title">
                            <i class="ri-macbook-fill"></i>
                            <span>Core Strengths</span>
                            </div>
                            <div class="skill-categories">
                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Creativity</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Adaptability</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Problem Solving</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Attention to Detail</h5>
                                        <span>Advanced</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Time Management</h5>
                                        <span>Advanced</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="skill-card">
                            <div class="skill-title">
                            <i class="ri-macbook-fill"></i>
                            <span>Workplace Skills</span>
                            </div>
                            <div class="skill-categories">
                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Communication</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Team Collaboration</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Leadership</h5>
                                        <span>Beginner</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Critical Thinking</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                                <div class="skill">
                                    <i class="ri-checkbox-circle-fill"></i>
                                    <div class="skill-info">
                                        <h5>Decision Making</h5>
                                        <span>Intermediate</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div> 
            </div>
        </div>       
    </section>


    <!-- ===== Experience section ====== -->

    <section class="experience section" id="experience">
        <h2 class="section-title reveal-up" data-title="My Experience">What Can I Do</h2>

        <div class="container">
            <div class="swiper exp-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide card reveal-up reveal-delay-1">
                        <h4 class="exp-subtitle">Beginner</h4>

                        <h3 class="exp-title">Java</h3>

                        <p class="exp-description">I’m currently learning the fundamentals of Java, focusing on object-oriented programming and logic building to strengthen my understanding of backend development.</p>

                        <!-- <a href="" class="link">See More <i class="ri-arrow-right-line link-icon"></i>
                        </a> -->
                    </div>

                    <div class="swiper-slide card reveal-up reveal-delay-2">
                        <h4 class="exp-subtitle">Intermediate</h4>

                        <h3 class="exp-title">CSS</h3>

                        <p class="exp-description">I have experience creating responsive and visually appealing layouts using CSS. I enjoy experimenting with animations, gradients, and modern design techniques to improve user experience.</p>

                        <!-- <a href="" class="link">See More <i class="ri-arrow-right-line link-icon"></i>
                        </a> -->
                    </div>

                    <div class="swiper-slide card reveal-up reveal-delay-3">
                        <h4 class="exp-subtitle">Beginner</h4>

                        <h3 class="exp-title">Javascript</h3>

                        <p class="exp-description">I’m exploring JavaScript to make websites more interactive. I’ve learned how to manipulate the DOM and handle basic events, and I’m continuing to expand my skills in front-end logic.</p>

                        <!-- <a href="" class="link">See More <i class="ri-arrow-right-line link-icon"></i>
                        </a> -->
                    </div>

                    <div class="swiper-slide card reveal-up reveal-delay-4">
                        <h4 class="exp-subtitle">Beginner</h4>

                        <h3 class="exp-title">C</h3>

                        <p class="exp-description">C helped me build a solid foundation in programming logic, syntax, and problem-solving. It improved how I think about structuring code efficiently.</p>

                        <!-- <a href="" class="link">See More <i class="ri-arrow-right-line link-icon"></i>
                        </a> -->
                    </div>

                    <div class="swiper-slide card reveal-up reveal-delay-5">
                        <h4 class="exp-subtitle">Intermediate</h4>

                        <h3 class="exp-title">HTML</h3>

                        <p class="exp-description">HTML is where my journey began. I can confidently structure web pages, use semantic elements, and ensure accessibility for better web standards.</p>

                        <!-- <a href="" class="link">See More <i class="ri-arrow-right-line link-icon"></i>
                        </a> -->

                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- ===== Portfolio ===== -->
    <section class="sue-section nav-menu-section" id="portfolio"
    style="padding-top: 1rem;">
        <div class="container sue-sub-container">
            <div class="sue-wrapper">
                <h2 class="section-title reveal-up" data-title="My Works">Projects</h2>


            <!-- PROJECT NAV -->
            <div class="portfolio-tabs reveal-up reveal-delay-1">
            <a class="tab-btn active" data-filter="all">All</a>

            <?php
                $categories = [];
                foreach ($projects as $row) {
                    $cat = strtolower(trim($row['category']));
                    if (!in_array($cat, $categories)) {
                        $categories[] = $cat;
                    }
                }

                foreach ($categories as $cat):
                    $filterName = str_replace(' ', '-', $cat); 
                    $label = ucwords($cat); 
            ?>
                <a class="tab-btn" data-filter="<?php echo $filterName; ?>">
                    <?php echo $label; ?>
                </a>

            <?php endforeach; ?>

            <button class="add-btn" id="addProjectBtn" style="display: none;">
                            <i class="ri-add-line"></i> Add Project
            </button> 
            
            </div>


            <!-- ADD PROJECT -->
            <div class="portfolio-modal-backdrop" id="addProjectModal" style="display: none;">
                <div class="portfolio-modal">
                    <a class="modal-close-btn" id="closeAddModal">
                        <i class="ri-close-line"></i>
                    </a>
                    <div class="modal-content">
                        <h4 class="modal-title">Add New Project</h4>

                        <form id="addProjectForm" method="POST" action="<?php echo BASE_URL; ?>admin/controller/projectController.php?action=create" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" id="category" name="category" placeholder="e.g. Web Design" required>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="e.g. Portfolio Website" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4" placeholder="Write a description..." required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Project Image</label>
                                <input type="file" id="image" name="image" accept="image/*">
                            </div>

                            <button type="submit" class="submit-btn" name="saveProject">Save Project</button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- CONTENT PROJECTS -->
            <div class="section-content">
                <div class="portfolio-container">
                    <?php 
                    $p_delay = 1;
                    foreach ($projects as $row): 
                        $delay_class = "reveal-up reveal-delay-" . min($p_delay, 8);
                        $p_delay++;
                    ?>
                        <div class="card-with-modal <?php echo strtolower(str_replace(' ', '-', $row['category'])); ?> <?php echo $delay_class; ?>">
                            <div class="portfolio-card">
                                <div class="card-img">
                                    <img src="<?php echo BASE_URL . ($row['image'] ?: 'uploads/default.jpg'); ?>" alt="">
                                </div>
                                <div class="card-info">
                                    <span><?php echo htmlspecialchars($row['category']); ?></span>
                                    <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                                    <i class="ri-arrow-right-up-line card-btn"></i>
                                </div>
                            </div>

                            <div class="portfolio-modal-backdrop">
                                <div class="portfolio-modal">
                                    <a class="modal-close-btn"><i class="ri-close-line"></i></a>
                                    <div class="modal-content">
                                        <div class="modal-img">
                                            <img src="<?php echo BASE_URL . ($row['image'] ?: 'uploads/default.jpg'); ?>" alt="">
                                        </div>
                                        <h4 class="modal-title"><?php echo htmlspecialchars($row['title']); ?></h4>
                                        <p class="description"><?php echo htmlspecialchars($row['description']); ?></p>


                                        <!-- EDIT / DELETE BUTTONS -->
                                        <div class="modal-actions" style="display: none;">
                                        <button class="edit-btn"
                                            data-id="<?php echo $row['id']; ?>"
                                            data-category="<?php echo htmlspecialchars($row['category']); ?>"
                                            data-title="<?php echo htmlspecialchars($row['title']); ?>"
                                            data-description="<?php echo htmlspecialchars($row['description']); ?>"
                                            data-image="<?php echo htmlspecialchars($row['image']); ?>">
                                            <i class="ri-edit-line"></i> Edit
                                        </button>

                                        <button class="delete-btn"
                                            data-id="<?php echo $row['id']; ?>">
                                            <i class="ri-delete-bin-line"></i> Delete
                                        </button>
                                        </div>                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

                    <!-- EDIT PROJECT -->
    <div class="portfolio-modal-backdrop" id="editProjectModal" style="display: none;">
        <div class="portfolio-modal">
            <a class="modal-close-btn" id="closeEditModal"><i class="ri-close-line"></i></a>
            <div class="modal-content">
            <h4 class="modal-title">Edit Project</h4>

            <form id="editProjectForm" method="POST"
                action="<?php echo BASE_URL; ?>admin/controller/projectController.php?action=update"
                enctype="multipart/form-data">

                <input type="hidden" id="editId" name="id">
                <input type="hidden" id="editExistingImage" name="existing_image">

                <div class="form-group">
                <label for="editCategory">Category</label>
                <input type="text" id="editCategory" name="category" required>
                </div>

                <div class="form-group">
                <label for="editTitle">Title</label>
                <input type="text" id="editTitle" name="title" required>
                </div>

                <div class="form-group">
                <label for="editDescription">Description</label>
                <textarea id="editDescription" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                <label for="editImage">Replace Image (optional)</label>
                <input type="file" id="editImage" name="image" accept="image/*">
                </div>

                <button type="submit" class="submit-btn">Update Project</button>
            </form>
            </div>
        </div>
    </div>
    </section>


    <!-- ===== Contact Section ===== -->
    <section class="contact section" id="contacts">
        <h2 class="section-title reveal-up" data-title="Hop on">Contact Me</h2>

        <div class="contact-container grid">

            <div class="contact-content reveal-left">

                <div class="contact-card">
                    <span class="contact-icon">
                        <i class="ri-map-2-line"></i>
                    </span>

                    <div>
                        <h3 class="contact-title">Address</h3>
                        <p class="contact-data">Blk 1, Lot 12, Villar Riza Subd., San Vicente, Liloan, Cebu</p>
                    </div>
                </div>

                <div class="contact-card">
                    <span class="contact-icon">
                        <i class="ri-mail-line"></i>
                    </span>

                    <div>
                        <h3 class="contact-title">Email</h3>
                        <p class="contact-data">samananiascases@gmail.com</p>
                    </div>
                </div>

                <div class="contact-card">
                    <span class="contact-icon">
                        <i class="ri-contacts-book-2-line"></i>
                    </span>

                    <div>
                        <h3 class="contact-title">Phone</h3>
                        <p class="contact-data">+63 992 573 1056</p>
                    </div>
                </div>
            </div>

            <form action="" class="contact-form grid reveal-right" id="contact-form">
                <div class="contact-form-group grid">

                    <div class="contact-form-div">
                        <label for="contact-name" class="contact-form-label">Your Full Name <b>*</b></label>

                        <input type="text" id="contact-name" name="name" class="contact-form-input" autocomplete="name">

                    </div>

                    <div class="contact-form-div">
                        <label for="contact-email" class="contact-form-label">Your Email Address <b>*</b></label>

                        <input type="email" id="contact-email" name="email" class="contact-form-input" autocomplete="email">
                        
                    </div>
                </div>

                    <div class="contact-form-div">
                            <label for="contact-subject" class="contact-form-label">Your Subject <b>*</b></label>

                            <input type="text" id="contact-subject" name="subject" class="contact-form-input">
                            
                    </div>
                    
                    <div class="contact-form-div">
                            <label for="contact-message" class="contact-form-label">Your Message <b>*</b></label>

                            <!--'name' is to connect to the emailjs-->
                            <textarea id="contact-message" name="message" class="contact-form-input contact-form-area"></textarea>
                            
                    </div>

                    <div class="contact-submit">
                        <span>* Accept the terms and conditions.</span>
                        <button class="btn-contact" type="submit">Send Message</button>
                    </div>

                    <p class="message" id="message"></p>
            </form>
        </div>
    </section>
    
    </main>

<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

<!-- Emailjs -->
 <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
        
</script>

<script>
  const BASE_URL = "<?php echo BASE_URL; ?>";
</script>

<script src="<?php echo BASE_URL; ?>assets/js/darkmodeJS.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/portfolioJs.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/contactsubmit.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/myPortDice.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/swiper.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/resumejs.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/scrollReveal.js"></script>


</body>
</html>