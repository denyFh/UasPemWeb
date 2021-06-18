<?php include("./dir-path.php"); ?>
<?php include(ROOT_PATH . '/app/controller/posts.php');

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- AOS Library  -->
  <link rel="stylesheet" href="./assets/css/aos.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/stylesheet.css">

  <title><?php echo $post['title']; ?></title>
</head>

<body id="pages">
  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v11.0" nonce="WWoa72BE"></script>

  <?php include(ROOT_PATH . "/app/includes/header-2.php"); ?>

  <!-- Page Wrapper -->
  <section>
    <div class="page-wrapper">

      <!-- Content -->
      <section>
        <div class="content clearfix">

          <!-- Main Content Wrapper -->
          <div class="main-content-wrapper">
            <div class="main-content single">
              <h1 class="post-title"><?php echo $post['title']; ?></h1>

              <div class="post-content">
                <?php echo html_entity_decode($post['body']); ?>
              </div>

            </div>
          </div>
          <!-- // Main Content -->

          <!-- Sidebar -->
          <div class="sidebar single">

            <div class="fb-page" data-href="https://www.facebook.com/fasilkomunej" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="https://www.facebook.com/fasilkomunej" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/fasilkomunej">Fasilkom UNEJ</a></blockquote>
            </div>

            <div class="section popular">
              <h2 class="section-title">Popular</h2>

              <?php foreach ($posts as $p) : ?>
                <div class="post clearfix">
                  <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                  <a href="" class="title">
                    <h4><?php echo $p['title'] ?></h4>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="section topics">
              <h2 class="section-title">Topics</h2>
              <ul>
                <?php foreach ($topics as $topic) : ?>
                  <li><a href="<?php echo BASE_URL . '/pages.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <div class="button-group">
              <a href="./pages.php" class="btn btn-big">Back</a>
            </div>
          </div>
      </section>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

    </div>
    <!-- // Page Wrapper -->
  </section>

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