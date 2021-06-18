<?php include('dir-path.php'); ?>
<?php include(ROOT_PATH . "/app/controller/users.php"); 
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=chrome">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/css/all.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- AOS Library  -->
  <link rel="stylesheet" href="./assets/css/aos.css">

  <!-- Custom Style   -->
  <link rel="stylesheet" href="./assets/css/stylesheet.css">

  <title>Login</title>
</head>

<body>

<main class="login">
  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <div class="auth-content">

    <form action="login.php" method="post">
      <h2 class="form-title">Login</h2>

      <?php include(ROOT_PATH . "/app/helpers/form-validation.php"); ?>

      <div>
        <label for="uname">Username</label>
        <input type="text" name="username" id="uname" value="<?php echo $username; ?>" class="text-input">
      </div>
      <div>
        <label for="pw">Password</label>
        <input type="password" name="password" id="pw" value="<?php echo $password; ?>" class="text-input">
      </div>
      <div id="button-align">
        <button type="submit" name="login-btn" class="btn btn-big">Login</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></p>
    </form>

  </div>
</main>

  <!-- Jquery Library file -->
  <script src="./assets/js/Jquery3.4.1.min.js"></script>

  <!-- Owl-Carousel js -->
  <script src="./assets/js/owl.carousel.min.js"></script>

  <!-- AOS js Library -->
  <script src="./assets/js/aos.js"></script>

  <!-- Custom Javascript file -->
  <script src="./assets/js/main.js"></script>

</body>

</html>