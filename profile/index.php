<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header('Location: ../auth');
  exit;
} else {
  require_once "../assets/php/connect.php";
  
  $userId = $_SESSION['user_id'];

  $result = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = $userId ");
  $row = mysqli_fetch_assoc($result);

  $userRights = $row['user_rights'];
  $userLogin = $row['user_login'];
  $userAvatar = $row['user_avatar'];
  $userEmail = $row['user_email'];
  $n = $row['user_name'];
  $s = $row['user_surname'];
  $m = $row['user_midname'];
  $userName = ""."$s"." "."$n"." "."$m"."";
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="/assets/css/bootstrap-icons/bootstrap-icons.svg"
    />
    <title>BifkTest</title>
  </head>
  <body>
    <div class="wrapper">
      <?php
        require_once "../assets/php/sidebar.php";
      ?>
      <div class="content">
        <div
          class="container-fluid d-flex h-100 justify-content-center align-items-center p-0"
        >
        <div class="row">
            <div class="col-12 form-wrapper">
              <h2 class="text-center mb-3">Редактировать профиль</h2>
              <form action="../assets/php/profile.php" class="form-profile" method="POST" enctype="multipart/form-data">
                <div class="personal-image mb-3">
                  <label class="personal-image_label">
                    <input type="file" name="avatar" />
                    <figure class="personal-image_figure">
                      <img
                        src="/assets/avatars/<?php echo $userLogin.'/'.$userAvatar?>"
                        class="personal-image_avatar"
                        alt="<?php echo $userName?>"
                      />
                      <figcaption class="personal-image_figcaption">
                        <img
                          src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png"
                        />
                      </figcaption>
                    </figure>
                  </label>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Имя</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="<?php echo $n?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="surname" class="form-label">Фамилия</label>
                  <input
                    type="text"
                    class="form-control"
                    name="surname"
                    id="surname"
                    value="<?php echo $s?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="MiddleName" class="form-label">Отчество</label>
                  <input
                    type="text"
                    class="form-control"
                    name="MiddleName"
                    id="MiddleName"
                    value="<?php echo $m?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    value="<?php echo $userEmail?>"
                  />
                </div>
                <button
                  type="submit"
                  name="submitProfile"
                  class="btn btn-success"
                >
                  Сохранить
                </button>
              </form>
            </div>
          </div>
    <script src="/assets/js/avatar.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
