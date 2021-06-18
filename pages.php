<?php
include("dir-path.php");
include(ROOT_PATH . "/app/controller/topics.php");

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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">

    <!-- AOS Library  -->
    <link rel="stylesheet" href="./assets/css/aos.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/stylesheet.css">

    <title>Blog</title>
</head>

<body id="pages">

    <?php include(ROOT_PATH . "/app/includes/header-2.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <div class="page-wrapper">
        <!-- Post Slider -->
        <section class="carousel-sect" id="carousel-sect">
            <h1 style="text-align:center;margin-bottom:0px;">Posts To Read</h1>

            <div class="blog post-wrapper">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                        <?php foreach ($posts as $post) : ?>
                            <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                                <img src="<?php echo './assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                                <div class="post-info blog-title">
                                    <?php if (isset($_SESSION['id'])) { ?>
                                        <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                                    <?php } else {
                                        echo '<h4><a href="login.php">' . $post['title'] . '</a></h4>';
                                    } ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="owl-navigation" enabled>
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Post Slider -->

        <!-- Content -->
        <section>
            <div class="content clearfix">

                <!-- Main Content -->
                <div class="main-content">
                    <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

                    <?php foreach ($posts as $post) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo './assets/images/' . $post['image']; ?>" alt="" class="post-image">
                            <div class="post-preview">
                                <?php if (isset($_SESSION['id'])) {?>
                                    <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                                <?php } else {
                                    echo '<h2><a href="login.php">' . $post['title'] . '</a></h2>';
                                } ?>
                                <i class="far fa-user"> <?php echo $post['username']; ?></i>
                                &nbsp;
                                <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_time'])); ?></i>
                                <p class="preview-text">
                                    <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                                </p>
                                <?php if (isset($_SESSION['id'])) {?>
                                    <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                                <?php } else {
                                    echo '<a href="login.php" class="btn read-more">Read More</a>';
                                } ?> 
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- // Main Content -->
                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="pages.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                    </div>


                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            <?php foreach ($topics as $key => $topic) : ?>
                                <li><a href="<?php echo './pages.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
                <!-- // Content -->
            </div>
    </div>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


    <!-- JQuery -->
    <script src="./assets/js/Jquery3.4.1.min.js"></script>

    <!-- Owl-Carousel js -->
    <script src="./assets/js/owl.carousel.min.js"></script>

    <!-- AOS js Library -->
    <script src="./assets/js/aos.js"></script>

    <!-- Custom Script -->
    <script src="./assets/js/main.js"></script>

</body>

</html>