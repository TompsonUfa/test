<?php
session_start();
$userId = $_SESSION['user_id'];
require_once "connect.php";
if (isset($_POST['submitProfile'])){
  if(isset($_FILES['avatar'])){
    $avatar = $_FILES['avatar'];
    if(avatarSecurity($avatar)){
      loadAvatar($avatar,$userId,$mysqli);
    }
  }
  $formName = $_POST['name'];
  $formSurname = $_POST['surname'];
  $formMiddlename = $_POST['MiddleName'];
  $result = $mysqli->query("UPDATE `users` SET user_name = '$formName', user_surname = '$formSurname', user_midname = '$formMiddlename' WHERE `user_id` = '$userId'");
  header('Location: ../../profile');
}
function avatarSecurity($avatar){
    $nameAvatar = $avatar['name'];
    $typeAvatar = $avatar['type'];
    $size = $avatar['size'];
    $blacklist = array(".php", ".js",".html");
    foreach($blacklist as $el){
      if(preg_match("/$el\$/i",$nameAvatar)) return false;
    }
    if(($typeAvatar != "image/png") && ($typeAvatar != "image/jpg") && ($typeAvatar != "image/jpeg") && ($typeAvatar != "image/webp")) return false;
    if($size > 5 * 1024 * 1024) return false;
    return true;
}
function loadAvatar($avatar,$userId,$mysqli){
  $typeAvatar = $avatar['type'];
  $name = md5(microtime()).'.'.substr($typeAvatar, strlen("image/"));
  $result = $mysqli->query("SELECT user_login FROM `users` WHERE `user_id` = '$userId'");
  $row = mysqli_fetch_assoc($result);
  $dir = "../avatars/".$row['user_login']."/";
  $uploadfile = $dir.$name;
  if(move_uploaded_file($avatar['tmp_name'],$uploadfile)){
    $result = $mysqli->query("UPDATE `users` SET user_avatar = '$name' WHERE `user_id` = '$userId'");
  } else {
    return false;
  }
  return true;
}
?>