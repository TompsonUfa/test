<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header('Location: /auth');
  exit;
} else {
  require_once "../assets/php/connect.php";

  $userId = $_SESSION['user_id'];

  $result = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = $userId ");
$row = mysqli_fetch_assoc($result); $userRights = $row['user_rights'];
$userLogin = $row['user_login']; $userAvatar = $row['user_avatar']; $n =
$row['user_name']; $s = $row['user_surname']; $m = $row['user_midname'];
$userName = ""."$s"." "."$n"." "."$m".""; } ?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="/assets/css/bootstrap-icons/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <title>BifkTest</title>
  </head>

  <body>
    <div class="wrapper">
      <?php
        require_once "../assets/php/sidebar.php";
      ?>
      <div class="content">
        <div
          class="container-fluid d-flex justify-content-center align-items-center flex-column"
        >
          <div class="row p-5 mb-3 block-wrapper">
            <h3 class="text-center mb-3">Оглавление теста</h3>
            <div class="col-12">
              <input
                type="text"
                class="form-control mb-3"
                name="nameTest"
                placeholder="Название теста"
                require
              />
              <input
                type="text"
                class="form-control mb-3"
                name="descTest"
                placeholder="Описание теста"
                require
              />
              <input
                type="text"
                class="form-control mb-3"
                name="classTest"
                placeholder="Категория теста"
                require
              />
            </div>
          </div>
          <div class="row p-5 mb-3 block-wrapper question" data-list-number="1">
            <h3 class="text-center mb-3">Вопрос 1</h3>
            <div class="col-12 d-flex mb-3">
              <input type="text" class="form-control" placeholder="Название" />
              <select class="form-select w-25">
                <option class="numberOptions" selected value="1">
                  Один ответ
                </option>
                <option class="numberOptions" value="2">
                  Несколько ответов
                </option>
              </select>
            </div>
            <div class="col-12 list-options">
              <div
                class="list-options__item mb-3 d-flex justify-content-center align-items-center"
              >
                <input
                  class="form-check-input mx-2"
                  type="radio"
                  name="options-1"
                  checked
                />
                <input
                  type="text"
                  class="form-control"
                  placeholder="Вариант"
                  require
                />
              </div>
            </div>
            <div class="col-12">
              <button class="btn w-100 btn-add-options">
                Добавить вариант
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button class="btn btn-add btn-add-question mb-3">
                Добавить вопрос
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="/assets/js/options.js"></script>
    <script src="/assets/js/create-test.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
