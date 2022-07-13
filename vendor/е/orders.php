<?php
$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}
$input1 = $_POST["input1"];
$input2 = $_POST["input2"];
$input3 = $_POST["input3"];
$student = $_POST["student"];

        $connect->query("INSERT INTO `orders`(`kurse`, `name`, `text`, `id_Students`) VALUES ('$input1','$input2','$input3','$student')");