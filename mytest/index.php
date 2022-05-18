<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header('Location: /auth');
  exit;
} else {
  require_once "../assets/php/connect.php";

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

  $test = "private";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <title>BifkTest</title>
</head>

<body>
    <div class="wrapper">
        <?php
        require_once "../assets/php/sidebar.php";
      ?>
        <!-- <nav class="navbar navbar-expand-sm fixed-top px-lg-5">
            <div class="container-fluid ">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Сортировать
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item" href="#">По названию</a></li>
                        <li><a class="dropdown-item" href="#">По автору</a></li>
                        <li><a class="dropdown-item" href="#">По категории</a></li>
                        <li><a class="dropdown-item" href="#">По дате</a></li>
                        <ul>
                </div>
                <form class="form-inline my-2 my-lg-0 d-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Что ищем?" aria-label="Что ищем?">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
                </form>
            </div>
        </nav> -->
        <div class="content">
            <div class="container-fluid">
                <a class="btn btn-add position-fixed" href="/addtest">Добавить</a>
                <div class="row justify-content-center list-cart">
                    <?php
                  require_once "../assets/php/test.php";
                ?>
                </div>
                <div class="targetScroll p-2" data-page="1" data-max="<?php echo $resultpage; ?>"></div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/loadCart.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>