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
      href="/assets/css/bootstrap-icons/font/bootstrap-icons.css"
    />
    <title>BifkTest</title>
  </head>
  <body>
    <div class="wrapper">
      <?php
        require_once "../assets/php/sidebar.php";
      ?>
      <div class="content">
        <div class="container py-5">
          <div class="test">
            <?php
              require_once "../assets/php/connect.php";
              
              $testId = $_GET['test'];
  
              $result = $mysqli->query("SELECT t.*,u.user_login,u.user_avatar,u.user_name,u.user_surname,u.user_midname FROM `tests` AS t JOIN `users` AS u on t.test_author = u.user_id WHERE t.test_id = '$testId' LIMIT 1");
              $row = mysqli_fetch_assoc($result);

              $authorLogin = $row['user_login'];
              $testTitle = $row['test_title'];
              $testSubtitle = $row['test_subtitle'];
              $authorAvatar = $row['user_avatar'];
              $testCategory = $row['test_category'];
              $n = $row['user_name'];
              $s = $row['user_surname'];
              $m = $row['user_midname'];
              $authorName = ""."$s"." "."$n"." "."$m"."";

              if ($testCategory == "История"){

                $bgTest = "history.png";
                $alt = "Тест по истории";

              }
            ?>
            <div class="test__header">
            <?php 
              echo '
                <img
                  src="../assets/bgTest/'.$bgTest.'"
                  alt="'.$alt.'"
                />
              ';
            ?>
            </div>
            <div class="test__content">
              <div class="test__title">
                <h3 class="test__name"><?php
                 echo $testTitle; 
                 ?></h3>
                <p class="test__descriptions">
                  <?php echo $testSubtitle; ?>
                </p>
                <div class="test__user">
                  <img src="/assets/avatars/<?php echo '/'.$authorLogin.'/'.$authorAvatar; ?>" alt="" />
                  <div class="test__user-info">
                    <h5><?php echo $authorName; ?></h5>
                  </div>
                </div>
              </div>
              <div class="test-list">
                <?php 
                  $result = $mysqli->query("SELECT * FROM `test_questions` WHERE test_id = '$testId'");
                  $counter = 0;
                  while($row = $result->fetch_assoc()) {
                    $counter++;
                    $qId = $row['questions_id'];
                    echo '
                    <div class="test-list__item">
                      <h5 class="question">'.$counter.'.
                      '.$row['questions_name'].'
                      </h5>';
                      if ($row['several_options'] == 'yes'){
                          echo '
                            <p>Несколько вариантов ответов</p>
                            <div class="answer-options several-options d-flex flex-wrap">
                          ';
                      } else {
                          echo '
                            <div class="answer-options d-flex flex-wrap">
                          ';
                      }
                      
                      $resultQue = $mysqli->query("SELECT * FROM `test_option` WHERE questions_id = '$qId'");
                      while($row = $resultQue->fetch_assoc()) {
                        echo '
                        <button class="btn btn-amswer m-1">
                        '.$row['option_name'].'
                        </button>
                        ';
                      }
                      echo '
                      </div>
                    </div>
                    ';
                   
                  }
                ?>    
              </div>
              <button type="submit" class="btn btn-post">Отправить</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/btn-amswer.js"></script>
  </body>
</html>
