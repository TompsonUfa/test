<?php
session_start();
if(isset($_SESSION['user_id'])){
  header('Location: ../');
} else {
  require_once "../assets/php/connect.php";
  if (isset($_POST['submit'])){
    $login = $_POST['login'];
    $result = $mysqli->query("SELECT * FROM `users` WHERE user_login = '$login'");
    $err = "";
    $myrow = mysqli_fetch_array ($result);
    $num_rows = mysqli_num_rows($result);
    if($num_rows == '1'){
      $password = md5($_POST['password']);
      if($myrow['user_password'] == $password){
        $_SESSION['user_id'] = $myrow['user_id'];
        header('Location: ../');
      } else {
        $err = "Логин или пароль не верный";
      }
    } else {
      $err = "Логин или пароль не верный";
    }
  } 
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link
      rel="stylesheet"
      href="/assets/css/bootstrap-icons/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <title>BIFK | Авторизация</title>
  </head>
  <body>
    <div class="wrapper d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 col-lg-5">
            <div class="auth-wrap">
              <div class="auth-wrap__img"></div>
              <div class="login-wrap p-lg-5 p-4 p-md-5">
                <h2 class="text-center text-uppercase">Авторизация</h2>
                <form class="form-auth p-5" method="post">
                  <div class="form-group mb-4 pb-2">
                    <input type="text" class="form-control" name="login" required />
                    <label for="username" class="form-control-placeholder"
                      >Логин</label
                    >
                  </div>
                  <div class="form-group mb-4 pb-2">
                    <input
                      type="password"
                      class="form-control form-control-password"
                      required
                      name="password"
                    />
                    <label for="username" class="form-control-placeholder"
                      >Пароль</label
                    >
                    <span class="field-icon toggle-password"
                      ><i class="bi bi-eye"></i
                    ></span>
                  </div>
                  <?php
                  if (isset($_POST['submit']) and !$err == null){
                    echo '
                    <div class="form-group mb-4">
                    <p class="text-danger text-center">'.$err.'</p>
                    </div>
                    ';
                  }
                  ?>
                  <div class="form-group mb-4">
                    <button type="submit" name="submit" class="btn w-100">Войти</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/assets/js/toogglePass.js"></script>
  </body>
</html>
