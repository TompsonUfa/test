<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header('Location: /auth');
  exit;
} else {
  require_once "assets/php/connect.php";

  $userId = $_SESSION['user_id'];

  $result = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = $userId ");
  $row = mysqli_fetch_assoc($result);

  $userRights = $row['user_rights'];
  $userLogin = $row['user_login'];
  $userAvatar = $row['user_avatar'];
  $n = $row['user_name'];
  $s = $row['user_surname'];
  $m = $row['user_midname'];
  $userName = ""."$s"." "."$n"." "."$m"."";

  $test = "public";
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="assets/css/bootstrap-icons/font/bootstrap-icons.css"
    />
    <title>BifkTest</title>
  </head>
  <body>
    <div class="wrapper">
      <?php
        require_once "assets/php/sidebar.php";
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center list-cart">
            <?php
            require_once "assets/php/test.php";
            ?>
          </div>
          <div class="targetScroll p-2" data-page="1" data-max="<?php echo $resultpage; ?>"></div>
        </div>
      </div>
    </div>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/loadCart.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
