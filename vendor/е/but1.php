<?php
$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}
$student = $_POST["student"];
$fullname = $_POST["fullname"];
$birthdata = $_POST["birthdata"];
$place_of_birth = $_POST["place_of_birth"];
$adress = $_POST["adress"];
$reckoned = $_POST["reckoned"];
$groups = $_POST["groups"];
$Start_learning = $_POST["Start_learning"];
$graduation = $_POST["graduation"];
$Form_of_study = $_POST["Form_of_study"];
$Department = $_POST["Department"];
$Degree = $_POST["Degree"];
$Branch_of_knowledge = $_POST["Branch_of_knowledge"];
$Specialty = $_POST["Specialty"];
$program = $_POST["program"];
$ratingall = $_POST["ratingall"];
$RatingExcellent = $_POST["RatingExcellent"];
$RatingGood = $_POST["RatingGood"];
$RatingSatisfactory = $_POST["RatingSatisfactory"];
$DiplomTopic = $_POST["DiplomTopic"];
$DiplomGrade = $_POST["DiplomGrade"];
$Qualification = $_POST["Qualification"];
$Qualificationdata = $_POST["Qualificationdata"];

$connect->query(" UPDATE `students` SET `fullname`='$fullname',`birthdata`='$birthdata',`place_of_birth`='$place_of_birth',`adress`='$adress ',`reckoned`='$reckoned',`groups`='$groups ',`Start_learning`='$Start_learning',`graduation`='$graduation',`Form_of_study`='$Form_of_study',`Department`='$Department',`Degree`='$Degree',`Branch_of_knowledge`='$Branch_of_knowledge',`Specialty`='$Specialty',`program`='$program',`ratingall`='$ratingall',`RatingExcellent`='$RatingExcellent',`RatingGood`='$RatingGood',`RatingSatisfactory`='$RatingSatisfactory',`DiplomTopic`='$DiplomTopic',`DiplomGrade`='$DiplomGrade',`Qualification`='$Qualification',`Qualificationdata`='$Qualificationdata' WHERE `id_Students`=$student");