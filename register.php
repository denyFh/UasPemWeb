<?php include("dir-path.php"); ?>
<?php include(ROOT_PATH . "/app/controller/users.php");
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/stylesheet.css">

  <title>Register</title>
</head>

<body>
  
  
<main class="register">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <div class="auth-content">

    <form action="register.php" method="post">
      <h2 class="form-title">Register</h2>

      <?php include(ROOT_PATH . "/app/helpers/form-validation.php"); ?>

      <div>
        <label for="uname">Username</label>
        <input type="text" name="username" id="uname" value="<?php echo $username; ?>" class="text-input" >
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="text-input">
      </div>
      <div>
        <label for="pw">Password</label>
        <input type="password" name="password" id="pw" value="<?php echo $password; ?>" class="text-input">
      </div>
      <div>
        <label for="pw-conf">Password Confirmation</label>
        <input type="password" name="passwordConf" id="pw-conf" value="<?php echo $passwordConf; ?>" class="text-input">
      </div>
        <input type="hidden"><?php $admin = 1?>
      <div id="button-align">
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
    </form>

  </div>
</main>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>