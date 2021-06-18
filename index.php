<?php
include("dir-path.php");
include(ROOT_PATH . "/app/controller/users.php");


$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
    $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
} else {
    $posts = getPublishedPosts();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>GreenWorld</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./assets/css/all.css">

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">

    <!-- AOS Library  -->
    <link rel="stylesheet" href="./assets/css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./assets/css/stylesheet.css">

</head>

<body>

    <!-- Main Site Section -->

    <main>

        <!-- Site Title -->

        <section class="site-title">
            <?php include(ROOT_PATH . "/app/includes/header.php") ?>
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>Save the Earth</h3>
                <h1>Protect Our Forest</h1>
                <button class="btn" onclick="location.href='./pages.php'" id="bott">Explore</button>
                <?php if (!isset($_SESSION['id'])) :
                    $button = '<button class="btn-2" onclick="location.href=' . "'./login.php'" . '">Join Now !</button>';
                    echo $button;
                endif ?>
            </div>
        </section>

        <!-- Site Title -->

        <!-- Blog Carousel -->

        <section class="carousel-sect" id="carousel-sect">
            <h1 style="text-align:center;padding-top:3.2em;;margin-bottom:0px;">Expand your Knowledge</h1>
            <div class="blog">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                        <?php foreach ($posts as $post) : ?>
                            <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                                <img src="<?php echo './assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                                <div class="post-info blog-title">
                                    <?php if (isset($_SESSION['id'])) { ?>
                                        <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                                    <?php } else {
                                        echo '<h3><a href="login.php">' . $post['title'] . '</a></h3>';
                                    } ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Carousel -->

        <!-- Messages -->
        <!-- <section class="messages-sect">
            
        </section> -->

    </main>

    <!-- Main Site Section -->


    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quia atque nemo ad modi officiis
                    iure, autem nulla tenetur repellendus.</p>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <a href="https://www.facebook.com/chintaalya.6601" target="blank"><i class="fab fa-facebook-f"></i>
                        <a href="https://twitter.com/namakuchinta" target="blank"><i class="fab fa-twitter"></i>
                            <a href="https://www.instagram.com/denf.y/" target="blank"><i class="fab fa-instagram"></i>
                                <a href="https://www.youtube.com/channel/UCXHWHSRsexVkptCRhN0TJNw" target="blank"><i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Webpage made by
                <a href="https://github.com/denyFh/Uas_PemWeb_A6" target="_black"><i class="fab fa-github"></i> Uas Pemweb A6</a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- Footer -->

    <!-- Jquery Library file -->
    <script src="./assets/js/Jquery3.4.1.min.js"></script>

    <!-- Owl-Carousel js -->
    <script src="./assets/js/owl.carousel.min.js"></script>

    <!-- AOS js Library -->
    <script src="./assets/js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./assets/js/main.js"></script>

    <script>
        function scrolltoSect() {
            document.querySelector('#carousel-sect').scrollIntoView({
                behavior: 'smooth',
                time: 1 / 100
            });
        };
    </script>

</body>

</html>