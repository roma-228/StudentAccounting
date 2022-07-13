<?php
$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}
$Students = $_POST["id_Subjects"];
$id_Subjectsnot= $_POST["id_Subjectsnot"];
$resu = $_POST["result"];

        $connect->query("UPDATE `students` SET `id_ group`=(SELECT `id_ group` FROM `groups` WHERE `name` like '%$resu%'),`groups`='$resu' WHERE `id_Students`=$Students");
        $connect->query("UPDATE `students` SET `id_ group`=12 WHERE `id_Students`=$id_Subjectsnot");

