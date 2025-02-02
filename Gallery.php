<?php
// Gallery.php
require 'admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Photo Gallery - Sasen Migration Consultant Service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Migration, Visa, Photo Gallery, Image Collections" name="keywords">
    <meta content="Sasen Migration Consultant Service offers professional immigration and visa services. View our photo gallery to see our work." name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" 
      rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="./img//logo.jpg">

    <style>
        /* Gallery Styles */
        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s;
        }
        .gallery-image:hover {
            transform: scale(1.05);
        }
        .section-title .sub-title {
            font-size: 1rem;
            letter-spacing: 2px;
            color: #730777;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


     <!-- Topbar Start -->
     <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-5 text-center text-lg-start mb-lg-0">
                    <div class="d-flex">
                        <a href="#" class="text-muted me-4"><i class="fas fa-envelope text-secondary me-2"></i>sasen.migration2005@gmail.com</a>
                        <a href="#" class="text-muted me-0"><i class="fas fa-phone-alt text-secondary me-2"></i> +94 70 158 5500</a>
                    </div>
                </div>
                <div class="col-lg-3 row-cols-1 text-center mb-2 mb-lg-0">
                    
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <div class="d-inline-flex align-items-center" style="height: 45px;">
                            <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://www.facebook.com/share/rm65pfosDUsjnpCW/?mibextid=LQQJ4d"><i class="fab fa-facebook-f fw-normal text-secondary"></i></a>
                            <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://wa.me/+94701585500"><i class="fab fa-whatsapp fw-normal text-secondary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0 shadow-sm">
            <img src="img/logo.jpg" alt="Sasen Migration Logo" class="img-fluid me-2" style="height: 50px; width:auto;">
            <a href="index.html" class="navbar-brand d-flex align-items-center p-0">    
                <div class="d-flex flex-column">
                    <h1 class="m-0 fw-bold" style="font-size:1.75rem; color: #730777;">Sasen Migration</h1>
                    <small class="text-muted" style="font-size:0.9rem;">Specialist in Japan Visa</small>
                </div>
            </a>
            <button class="navbar-toggler ms-auto border-0 text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link text-dark fw-semibold mx-2">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link text-dark fw-semibold mx-2">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="service.html" class="nav-link text-dark fw-semibold mx-2">Service</a>
                    </li>
                    <li class="nav-item">
                        <a href="Gallery.php" class="nav-link text-dark fw-semibold mx-2 active">Gallery</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a href="contact.html" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title text-secondary mb-0" id="searchModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1" required>
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Photo Gallery</h3>
            <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Photo Gallery</li>
            </ol>    
        </div>
    </div>
    <!-- Header End -->

    <!-- Gallery Title -->
    <div class="section-title text-center mb-5 wow fadeInUp mt-5" data-wow-delay="0.1s">
        <div class="sub-style">
            <h5 class="sub-title text-primary px-3">Photo Gallery</h5>
        </div>
    </div>

    <!-- Gallery Start -->
    <main class="container my-4">
        <?php
        // Fetch all collections
        $collections_sql = "SELECT * FROM collections ORDER BY created_at DESC";
        $collections_result = $conn->query($collections_sql);

        if($collections_result->num_rows > 0){
            while($collection = $collections_result->fetch_assoc()){
                echo '
                <div class="mb-5">
                    <h3 class="mb-4">' . htmlspecialchars($collection['title']) . '</h3>
                    <div class="row g-3">
                ';

                // Fetch images for this collection
                $images_sql = "SELECT * FROM images WHERE collection_id = " . intval($collection['id']) . " ORDER BY created_at DESC";
                $images_result = $conn->query($images_sql);

                if($images_result->num_rows > 0){
                    while($image = $images_result->fetch_assoc()){
                        echo '
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="' . htmlspecialchars($image['image_path']) . '" alt="' . htmlspecialchars($collection['title']) . '" class="gallery-image">
                        </div>
                        ';
                    }
                } else {
                    echo '<p>No images in this collection.</p>';
                }

                echo '
                    </div>
                </div>
                ';
            }
        } else {
            echo '<p class="text-center">No collections found. Please check back later.</p>';
        }
        ?>
    </main>
    <!-- Gallery End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-secondary ">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> 93/1 HAKMANA ROAD MATARA</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> sasen.migration2005@gmail.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +94 70 1585500</a>
                            <a href="" class="mb-3"><i class="fas fa-phone me-2"></i> +94 71 0354270</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-secondary me-2"></i>
                                <a class="btn mx-1" href="https://www.facebook.com/share/rm65pfosDUsjnpCW/?mibextid=LQQJ4d"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn mx-1" href="https://wa.me/+94701585500"><i class="fab fa-whatsapp fw-normal text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-secondary ">Opening Time</h4>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Monday:</h6>
                                <p class="text-white mb-0">08.30 am to 04.45 pm</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Tuesday-Saturday:</h6>
                                <p class="text-white mb-0">09.00 am to 04.30 pm</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Vacation:</h6>
                                <p class="text-white mb-0">All Sunday is our vacation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-secondary ">Our Services</h4>
                            <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Back to Top</a>
                            <a href="./index.html" class=""><i class="fas fa-angle-right me-2"></i>Home </a>
                            <a href="./service.html" class=""><i class="fas fa-angle-right me-2"></i>Services </a>
                            <a href="./about.html" class=""><i class="fas fa-angle-right me-2"></i> AboutUs</a>
                            <a href="./Gallery.php" class=""><i class="fas fa-angle-right me-2"></i> Gallery</a>
                            <a href="./contact.html" class=""><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-secondary ">Contact Us</h4>
                            <p class="text-white mb-3">Clicked this Button and enter your email to get our latest news</p>
                            <div class="position-relative mx-auto rounded-pill">
                                <a href="https://wa.me/+94701585500" class="btn btn-primary rounded-pill position-absolute top-0 end-0  w-100 py-3 ps-4 pe-5">Click Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        
       <!-- Copyright Start -->
       <div class="container-fluid py-4" style="background-color: rgba(22, 22, 22, 0.897);">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-white"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Sasen Migration Consultant Service</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        Designed By <a class="border-bottom text-white" href="https://nexcodia.com">NexCodia Software Solutions</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   
    
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Initialize Libraries -->
    <script>
        new WOW().init();

        // Back to Top Button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });
        $('.back-to-top').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });

        // Counter Up
        $('.counter-value').counterUp({
            delay: 10,
            time: 2000
        });

        // Handle Newsletter Form Submission (Optional)
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.getElementById('newsletter-form');

            newsletterForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Here you can integrate EmailJS or another service for newsletter subscriptions
                // For demonstration, we'll just show a success message
                const newsletterMessage = '<div class="alert alert-success mt-3" role="alert">Thank you for subscribing!</div>';
                newsletterForm.innerHTML += newsletterMessage;
                newsletterForm.reset();
            });
        });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
