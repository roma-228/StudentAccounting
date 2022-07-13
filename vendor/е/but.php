<?php
$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}
$id = $_POST["id"];
$fun = $_POST["fun"];
$kurse = $_POST["kurse"];
$data = $_POST["data"];
$text = $_POST["text"];

$inputt2 = $_POST["inputt2"];
$inputt3 = $_POST["inputt3"];
$student = $_POST["student"];
$name = $_POST["name"];
$rating = $_POST["rating"];


$namee = $_POST["namee"];
$id_semestr = $_POST["id_semestr"];
$id_kurse = $_POST["id_kurse"];
$beginning = $_POST["beginning"];
$end = $_POST["end"];
$hourr = $_POST["hourr"];
$nameteacher = $_POST["nameteacher"];
$ratingg = $_POST["ratingg"];
$dateee = $_POST["dateee"];


$input2 = $_POST["input2"];
$input3 = $_POST["input3"];
$input4 = $_POST["input4"];
$input5 = $_POST["input5"];
$input6 = $_POST["input6"];
$input7 = $_POST["input7"];
$input8 = $_POST["input8"];
$input9 = $_POST["input9"];
$input10 = $_POST["input10"];

$sel = $_POST["sel"];


$fullname = $_POST["fullname"];
$birthdata = $_POST["birthdata"];
$place_of_birth = $_POST["place_of_birth"];
$adress = $_POST["adress"];
$reckoned = $_POST["reckoned"];
$sel1 = $_POST["sel1"];
$selid3 = $_POST["selid3"];
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


if($fun == 1){

}
elseif($fun == 2){
    $connect->query("UPDATE `orders` SET `kurse`='$kurse',`name`='$data ',`text`='$text' WHERE `id_Orders`=$id");
}
elseif($fun == 3){
    $connect->query("DELETE FROM `orders` WHERE `id_Orders`=$id");
}


elseif($fun == 4){
    $connect->query(" INSERT INTO `certification`( `name`, `rating`, `id_Students`) VALUES ('$inputt2','$inputt3','$student')");
}
elseif($fun == 5){
    $connect->query(" DELETE FROM `certification` WHERE `id_certification`=$id");
}
elseif($fun == 6){
    $connect->query(" UPDATE `certification` SET `name`='$name',`rating`='$rating ' WHERE `id_certification`=$id");
}


elseif($fun == 7){
    $connect->query(" DELETE FROM `practice` WHERE `id_practice`=$id");
}
elseif($fun == 8){
    $connect->query(" UPDATE `practice` SET `name`='$namee',`id_kurse`='$id_kurse',`id_semestr`='$id_semestr',`beginning`='$beginning',`end`='$end',`hour`='$hourr',`nameteacher`='$nameteacher',`rating`='$ratingg',`date`='$dateee' WHERE `id_practice`=    $id");
}
elseif($fun == 9){
    $connect->query(" INSERT INTO `practice`( `name`, `id_kurse`, `id_semestr`, `beginning`, `end`, `hour`, `nameteacher`, `rating`, `date`, `id_Students`) VALUES ('$input2','$input3','$input4','$input5','$input6','$input7','$input8','$input9','$input10','$student')");
}

elseif($fun == 11){
    $connect->query(" INSERT INTO `students`( `fullname`, `id_ group`, `birthdata`, `place_of_birth`, `adress`, `reckoned`, `groups`, `Start_learning`, `graduation`, `Form_of_study`, `Department`, `Degree`, `Branch_of_knowledge`, `Specialty`, `program`, `ratingall`, `RatingExcellent`, `RatingGood`, `RatingSatisfactory`, `DiplomTopic`, `DiplomGrade`) VALUES ('$fullname','$selid3 ','$birthdata','$place_of_birth','$adress','$reckoned','$sel1','$Start_learning','$graduation','$Form_of_study','$Department','$Degree','$Branch_of_knowledge','$Specialty','$program','$ratingall','$RatingExcellent','$RatingGood','$RatingSatisfactory','$DiplomTopic','$DiplomGrade')");
}    
