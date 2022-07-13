<?php

$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}
$id_Subjects = $_POST['id_Subjects'];
$Rating = $_POST['Rating'];
$Datee = $_POST['Datee'];
$students = $_POST['students'];
$semestr = $_POST['semestr'];

$qvery = $connect->query("SELECT COUNT(*) as COUNT FROM `evaluation` WHERE `id_semestr` = $semestr and `id_Students` = $students and `id_Subjects` = $id_Subjects");
while ($row = $qvery->fetch_assoc()) {
	$num = $row["COUNT"];
}

if($num !=0){
	$qvery1 = $connect->query("SELECT `id_Evaluation` FROM `evaluation` WHERE `id_semestr` = $semestr and `id_Students` = $students and `id_Subjects` = $id_Subjects");
	while ($row = $qvery1->fetch_assoc()) {
		$id_Evaluation = $row["id_Evaluation"];
	}
	$qvery2 = $connect->query("UPDATE `evaluation` SET `Evaluation`='$Rating',`data`='$Datee' WHERE `id_Evaluation` = $id_Evaluation");
}
elseif($num == 0){
	$Kyrse = $connect->query("INSERT INTO `evaluation`(  `id_semestr`,`id_Students`, `id_Subjects`, `Evaluation`, `data`) VALUES ('$semestr','$students','$id_Subjects','$Rating','$Datee')");
}



?>
