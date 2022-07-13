<?php
$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}
$stu = $_POST["stu"];
$fun = $_POST["fun"];
$name = $_POST["name"];
$kurse = $_POST["kurse"];


$nameSub = $_POST["nameSub"];
$group = $_POST["group"];
$semestr = $_POST["semestr"];
$hour = $_POST["hour"];
$ESTSr = $_POST["ESTSr"];
$Teacher = $_POST["Teacher"];

if($fun == 1){
    $connect->query("UPDATE `groups` SET `name`='$name' WHERE `id_ group`=$stu");
}
elseif($fun == 2){
    $connect->query("DELETE FROM `groups` WHERE `id_ group`=$stu");
}
elseif($fun == 3){
    $connect->query("INSERT INTO `groups`( `name`, `id_kurse`) VALUES ('$name','$kurse ')");
}
elseif($fun == 4){
    $connect->query("INSERT INTO `groups`( `name`, `id_kurse`) VALUES ('$name','$kurse ')");
}
elseif($fun == 5){
    $Student = $connect->query("SELECT `id_ group` FROM `groups` WHERE `name` LIKE '%$group%'");
    while ($row = $Student->fetch_assoc()) {
      $idgroup = $row["id_ group"];
    }
    $connect->query("UPDATE `subjects` SET `name`='$nameSub',`id_ group`='$idgroup',`hour`='$hour',`ESTS`='$ESTSr',`Teacher`='$Teacher',`id_semestr`='$semestr' WHERE `id_Subjects`=$stu ");
}
elseif($fun == 6){
    $connect->query("DELETE FROM `subjects` WHERE `id_Subjects`=$stu");
}
elseif($fun == 7){
    $Studentt = $connect->query("SELECT `id_ group` FROM `groups` WHERE `name` LIKE '%$group%'");
    while ($roww = $Studentt->fetch_assoc()) {
      $idgroup = $roww["id_ group"];
    }
    $connect->query("INSERT INTO `subjects`( `name`, `id_ group`, `hour`, `ESTS`, `Teacher`,  `id_semestr`) VALUES ('$nameSub','$idgroup','$hour','$ESTSr','$Teacher','$semestr')");
}
