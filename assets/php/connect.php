<?php
$mysqli = new mysqli("localhost", "test131", "adminBIFK2018!", "bifktest");
$mysqli->set_charset("utf8mb4");
if ($mysqli === false) {
    die("Ошибка: " . mysqli_connect_error());
} 
?>