<?php
require_once "connect.php";
$limit = 6;
$page = $_GET['page'];
$page = (empty($page)) ? 1 : $page;		
$start = ($page != 1) ? $page * $limit - $limit : 0;
$result = $mysqli->query("SELECT t.*,u.user_login,u.user_avatar,u.user_name,u.user_surname,u.user_midname FROM `tests` AS t JOIN `users` AS u on t.test_author = u.user_id LIMIT $start, $limit");
while($row = $result->fetch_assoc()) {
    $testId = $row['test_id'];
    $authorLogin = $row['user_login'];
    $testTitle = $row['test_title'];
    $testSubtitle = $row['test_subtitle'];
    $date = $row['test_date'];
    $testDate = resultDate($date);
    $testCategory = $row['test_category'];
    $authorAvatar = $row['user_avatar'];
    $n = $row['user_name'];
    $s = $row['user_surname'];
    $m = $row['user_midname'];
    $authorName = ""."$s"." "."$n"." "."$m"."";
    if ($testCategory == "История"){
        $bgTest = "history.png";
        $alt = "Тест по истории";
    } else {
        $bgTest = "funn.jpg";
        $alt = "Тест ";
    }
    echo '
    <div class="col-xxl-3 col-lg-6 col-sm-12 p-0 cart">
    <div class="cart__header">
      <img
        src="assets/bgTest/'.$bgTest.'"
        alt="'.$alt.'"
      />
    </div>
    <div class="cart__content">
      <span class="cart__tag cart__tag_teal">'.$testCategory.'</span>
      <h4 class="cart__title">'.$testTitle.'</h4>
      <p class="cart__descriptions mb-4">
      '.$testSubtitle.'
      </p>
      <a href="test?test='.$testId.'" class="btn mt-auto btn-primary mb-4"> Пройти </a>
      <div class="user">
        <img
          class="user__avatar"
          src="assets/avatars/'.$authorLogin.'/'.$authorAvatar.'"
          alt="'.$authorName.'"
        />
        <div class="user__info">
          <h5>'.$authorName.'</h5>
          <small>'.$testDate.'</small>
        </div>
      </div>
    </div>
  </div>
    ';
}
function resultDate($date){
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime($today. " - 1 day"));
    $befotreYer = date('Y-m-d', strtotime($today. " - 2 day"));
    
    if ($date == $today){
        $testDate = "Сегодня";
    } else if ($date == $yesterday){
        $testDate = "Вчера";
    } else if ($date == $befotreYer){
        $testDate = "Позавчера";
    } else {
        $testDate = $date;
    }
    return $testDate;
}
?>