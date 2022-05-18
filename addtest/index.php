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
        <div class="content">
            <div class="container py-5">
                <div class="test p-5">
                    <form class="add-test">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nameTest" placeholder="Название теста" require>
                            <label for="nameTest">Название теста</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="descriptionTest" placeholder="Описание теста"
                                require>
                            <label for="descriptionTest">Описание теста</label>
                        </div>
                        <div class="question">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nameQuestion" placeholder="Вопрос" require>
                                <label for="nameQuestion">Вопрос</label>
                            </div>
                            <ul>
                                <li>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nameQuestion" placeholder="Вопрос"
                                            require>
                                        <label for="nameQuestion">Вариант ответа</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nameQuestion" placeholder="Вопрос"
                                            require>
                                        <label for="nameQuestion">Вариант ответа</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nameQuestion" placeholder="Вопрос"
                                            require>
                                        <label for="nameQuestion">Вариант ответа</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nameQuestion" placeholder="Вопрос"
                                            require>
                                        <label for="nameQuestion">Вариант ответа</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nameQuestion"
                                            placeholder="Правильный ответ" require>
                                        <label for="nameQuestion">Правильный ответ</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>

</html>