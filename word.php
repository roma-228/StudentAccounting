<?php

require_once 'vendor/autoload.php';

$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}

$document = new \PhpOffice\PhpWord\TemplateProcessor('./review.docx');
$uploadDir =  __DIR__;


$Students = $_POST['Students'];
$qvery = $connect->query("SELECT * FROM `students` WHERE `id_Students`= $Students");
while ($row = $qvery->fetch_assoc()) {
    $id_Students = $row["id_Students"];
    $fullname = $row["fullname"];
    $id_group = $row["id_ group"];
    $birthdata = $row["birthdata"];
    $place_of_birth = $row["place_of_birth"];
    $adress = $row["adress"];
    $reckoned = $row["reckoned"];
    $groups = $row["groups"];
    $Start_learning = $row["Start_learning"];
    $graduation = $row["graduation"];
    $Form_of_study = $row["Form_of_study"];
    $Department = $row["Department"];
    $Degree = $row["Degree"];
    $Branch_of_knowledge = $row["Branch_of_knowledge"];
    $Specialty = $row["Specialty"];
    $program = $row["program"];
    $ratingall = $row["ratingall"];
    $RatingExcellent = $row["RatingExcellent"];
    $RatingGood = $row["RatingGood"];
    $RatingSatisfactory = $row["RatingSatisfactory"];
    $DiplomTopic = $row["DiplomTopic"];
    $DiplomGrade = $row["DiplomGrade"];
    $Qualification = $row["Qualification"];
    $Qualificationdata = $row["Qualificationdata"];
}
// Заповнення першої сторінки
$document->setValue('fullname', $fullname);
$document->setValue('birthdata', $birthdata);
$document->setValue('place_of_birth', $place_of_birth);
$document->setValue('reckoned', $reckoned);
$document->setValue('adress', $adress);
$document->setValue('groups', $groups);
$document->setValue('Start_learning', $Start_learning);
$document->setValue('graduation', $graduation);
$document->setValue('Form_of_study', $Form_of_study);
$document->setValue('Department', $Department);
$document->setValue('Degree', $Degree);
$document->setValue('Branch_of_knowledge', $Branch_of_knowledge);
$document->setValue('Specialty', $Specialty);
$document->setValue('program', $program);
$outputFile = "ІП_".$fullname.'.docx';

/////////////////////////////////////////
//Заповнення останньої сторінки
$document->setValue('ratingall', $ratingall);
$document->setValue('RatingExcellent', $RatingExcellent);
$document->setValue('RatingGood', $RatingGood);
$document->setValue('RatingSatisfactory', $RatingSatisfactory);
$document->setValue('DiplomTopic', $DiplomTopic);
$document->setValue('DiplomGrade', $DiplomGrade);
$document->setValue('Qualification', $Qualification);
$document->setValue('Qualificationdata', $Qualificationdata);



/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//Заповнення наказу//////////////////////////////////
/////////////////////////////////////////////////////
$num =1;
$qvery1 = $connect->query("SELECT `id_Orders`, `kurse`, `name`, `text`, `id_Students` FROM `orders` WHERE `id_Students`= $Students");
while ($row1 = $qvery1->fetch_assoc()) {
    $Okurse[$num] = $row1["kurse"];
    $Oname[$num] = $row1["name"];
    $Otext[$num] = $row1["text"];
    $num++;
}
$document->setValue('kurse1', $Okurse[1]);
$document->setValue('kurse2', $Okurse[2]);
$document->setValue('kurse3', $Okurse[3]);
$document->setValue('kurse4', $Okurse[4]);
$document->setValue('kurse5', $Okurse[5]);

$document->setValue('Oname1', $Oname[1]);
$document->setValue('Oname2', $Oname[2]);
$document->setValue('Oname3', $Oname[3]);
$document->setValue('Oname4', $Oname[4]);
$document->setValue('Oname5', $Oname[5]);

$document->setValue('Otext1', $Otext[1]);
$document->setValue('Otext2', $Otext[2]);
$document->setValue('Otext3', $Otext[3]);
$document->setValue('Otext4', $Otext[4]);
$document->setValue('Otext5', $Otext[5]);





////////////////////////////////////////////
///////////////////////////////////////////
//1СЕМЕСТР
//Заповнення 1 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=1 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet1[$num] = $row["name"];
    $hour1[$num] = $row["hour"];
    $ESTS1[$num] = $row["ESTS"];
    $Evaluation1[$num] = $row["Evaluation"];
    $data1[$num] = $row["data"];
    $Teacher1[$num] = $row["Teacher"];
    $num++;
}
                                    //заповнення назви пердметів 1 семестру
                                    $document->setValue('1name1', $predmet1[1]);
                                    $document->setValue('1name2', $predmet1[2]);
                                    $document->setValue('1name3', $predmet1[3]);
                                    $document->setValue('1name4', $predmet1[4]);
                                    $document->setValue('1name5', $predmet1[5]);
                                    $document->setValue('1name6', $predmet1[6]);
                                    $document->setValue('1name7', $predmet1[7]);
                                    $document->setValue('1name8', $predmet1[8]);
                                    $document->setValue('1name9', $predmet1[9]);
                                    $document->setValue('1name10', $predmet1[10]);
                                    $document->setValue('1name11', $predmet1[11]);
                                    $document->setValue('1name12', $predmet1[12]);
                                    $document->setValue('1name13', $predmet1[13]);
                                    $document->setValue('1name14', $predmet1[14]);
                                    $document->setValue('1name15', $predmet1[15]);
                                    $document->setValue('1name16', $predmet1[16]);

                                    //заповнення годин 1 семестру
                                    $document->setValue('1hour1', $hour1[1]);
                                    $document->setValue('1hour2', $hour1[2]);
                                    $document->setValue('1hour3', $hour1[3]);
                                    $document->setValue('1hour4', $hour1[4]);
                                    $document->setValue('1hour5', $hour1[5]);
                                    $document->setValue('1hour6', $hour1[6]);
                                    $document->setValue('1hour7', $hour1[7]);
                                    $document->setValue('1hour8', $hour1[8]);
                                    $document->setValue('1hour9', $hour1[9]);
                                    $document->setValue('1hour10', $hour1[10]);
                                    $document->setValue('1hour11', $hour1[11]);
                                    $document->setValue('1hour12', $hour1[12]);
                                    $document->setValue('1hour13', $hour1[13]);
                                    $document->setValue('1hour14', $hour1[14]);
                                    $document->setValue('1hour15', $hour1[15]);
                                    $document->setValue('1hour16', $hour1[16]);

                                    //заповнення кредитів 1 семестру
                                    $document->setValue('1ETTS1', $ESTS1[1]);
                                    $document->setValue('1ETTS2', $ESTS1[2]);
                                    $document->setValue('1ETTS3', $ESTS1[3]);
                                    $document->setValue('1ETTS4', $ESTS1[4]);
                                    $document->setValue('1ETTS5', $ESTS1[5]);
                                    $document->setValue('1ETTS6', $ESTS1[6]);
                                    $document->setValue('1ETTS7', $ESTS1[7]);
                                    $document->setValue('1ETTS8', $ESTS1[8]);
                                    $document->setValue('1ETTS9', $ESTS1[9]);
                                    $document->setValue('1ETTS10', $ESTS1[10]);
                                    $document->setValue('1ETTS11', $ESTS1[11]);
                                    $document->setValue('1ETTS12', $ESTS1[12]);
                                    $document->setValue('1ETTS13', $ESTS1[13]);
                                    $document->setValue('1ETTS14', $ESTS1[14]);
                                    $document->setValue('1ETTS15', $ESTS1[15]);
                                    $document->setValue('1ETTS16', $ESTS1[16]);

                                    //заповнення оцінок 1 семестру
                                    $document->setValue('1rating1', $Evaluation1[1]);
                                    $document->setValue('1rating2', $Evaluation1[2]);
                                    $document->setValue('1rating3', $Evaluation1[3]);
                                    $document->setValue('1rating4', $Evaluation1[4]);
                                    $document->setValue('1rating5', $Evaluation1[5]);
                                    $document->setValue('1rating6', $Evaluation1[6]);
                                    $document->setValue('1rating7', $Evaluation1[7]);
                                    $document->setValue('1rating8', $Evaluation1[8]);
                                    $document->setValue('1rating9', $Evaluation1[9]);
                                    $document->setValue('1rating10', $Evaluation1[10]);
                                    $document->setValue('1rating11', $Evaluation1[11]);
                                    $document->setValue('1rating12', $Evaluation1[12]);
                                    $document->setValue('1rating13', $Evaluation1[13]);
                                    $document->setValue('1rating14', $Evaluation1[14]);
                                    $document->setValue('1rating15', $Evaluation1[15]);
                                    $document->setValue('1rating16', $Evaluation1[16]);

                                    //заповнення дата 1 семестру
                                    $document->setValue('1date1', $data1[1]);
                                    $document->setValue('1date2', $data1[2]);
                                    $document->setValue('1date3', $data1[3]);
                                    $document->setValue('1date4', $data1[4]);
                                    $document->setValue('1date5', $data1[5]);
                                    $document->setValue('1date6', $data1[6]);
                                    $document->setValue('1date7', $data1[7]);
                                    $document->setValue('1date8', $data1[8]);
                                    $document->setValue('1date9', $data1[9]);
                                    $document->setValue('1date10', $data1[10]);
                                    $document->setValue('1date11', $data1[11]);
                                    $document->setValue('1date12', $data1[12]);
                                    $document->setValue('1date13', $data1[13]);
                                    $document->setValue('1date14', $data1[14]);
                                    $document->setValue('1date15', $data1[15]);
                                    $document->setValue('1date16', $data1[16]);

                                    //заповнення вчителів 1 семестру
                                    $document->setValue('1teacher1', $Teacher1[1]);
                                    $document->setValue('1teacher2', $Teacher1[2]);
                                    $document->setValue('1teacher3', $Teacher1[3]);
                                    $document->setValue('1teacher4', $Teacher1[4]);
                                    $document->setValue('1teacher5', $Teacher1[5]);
                                    $document->setValue('1teacher6', $Teacher1[6]);
                                    $document->setValue('1teacher7', $Teacher1[7]);
                                    $document->setValue('1teacher8', $Teacher1[8]);
                                    $document->setValue('1teacher9', $Teacher1[9]);
                                    $document->setValue('1teacher10', $Teacher1[10]);
                                    $document->setValue('1teacher11', $Teacher1[11]);
                                    $document->setValue('1teacher12', $Teacher1[12]);
                                    $document->setValue('1teacher13', $Teacher1[13]);
                                    $document->setValue('1teacher14', $Teacher1[14]);
                                    $document->setValue('1teacher15', $Teacher1[15]);
                                    $document->setValue('1teacher16', $Teacher1[16]);







////////////////////////////////////////////
///////////////////////////////////////////
//1СЕМЕСТР
//Заповнення 2 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=2 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet2[$num] = $row["name"];
    $hour2[$num] = $row["hour"];
    $ESTS2[$num] = $row["ESTS"];
    $Evaluation2[$num] = $row["Evaluation"];
    $data2[$num] = $row["data"];
    $Teacher2[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 2 семестру
                                            $document->setValue('2name1', $predmet2[1]);
                                            $document->setValue('2name2', $predmet2[2]);
                                            $document->setValue('2name3', $predmet2[3]);
                                            $document->setValue('2name4', $predmet2[4]);
                                            $document->setValue('2name5', $predmet2[5]);
                                            $document->setValue('2name6', $predmet2[6]);
                                            $document->setValue('2name7', $predmet2[7]);
                                            $document->setValue('2name8', $predmet2[8]);
                                            $document->setValue('2name9', $predmet2[9]);
                                            $document->setValue('2name10', $predmet2[10]);
                                            $document->setValue('2name11', $predmet2[11]);
                                            $document->setValue('2name12', $predmet2[12]);
                                            $document->setValue('2name13', $predmet2[13]);
                                            $document->setValue('2name14', $predmet2[14]);
                                            $document->setValue('2name15', $predmet2[15]);
                                            $document->setValue('2name16', $predmet2[16]);

                                            //заповнення годин 2 семестру
                                            $document->setValue('2hour1', $hour2[1]);
                                            $document->setValue('2hour2', $hour2[2]);
                                            $document->setValue('2hour3', $hour2[3]);
                                            $document->setValue('2hour4', $hour2[4]);
                                            $document->setValue('2hour5', $hour2[5]);
                                            $document->setValue('2hour6', $hour2[6]);
                                            $document->setValue('2hour7', $hour2[7]);
                                            $document->setValue('2hour8', $hour2[8]);
                                            $document->setValue('2hour9', $hour2[9]);
                                            $document->setValue('2hour10', $hour2[10]);
                                            $document->setValue('2hour11', $hour2[11]);
                                            $document->setValue('2hour12', $hour2[12]);
                                            $document->setValue('2hour13', $hour2[13]);
                                            $document->setValue('2hour14', $hour2[14]);
                                            $document->setValue('2hour15', $hour2[15]);
                                            $document->setValue('2hour16', $hour2[16]);

                                            //заповнення кредитів 2 семестру
                                            $document->setValue('2ETTS1', $ESTS2[1]);
                                            $document->setValue('2ETTS2', $ESTS2[2]);
                                            $document->setValue('2ETTS3', $ESTS2[3]);
                                            $document->setValue('2ETTS4', $ESTS2[4]);
                                            $document->setValue('2ETTS5', $ESTS2[5]);
                                            $document->setValue('2ETTS6', $ESTS2[6]);
                                            $document->setValue('2ETTS7', $ESTS2[7]);
                                            $document->setValue('2ETTS8', $ESTS2[8]);
                                            $document->setValue('2ETTS9', $ESTS2[9]);
                                            $document->setValue('2ETTS10', $ESTS2[10]);
                                            $document->setValue('2ETTS11', $ESTS2[11]);
                                            $document->setValue('2ETTS12', $ESTS2[12]);
                                            $document->setValue('2ETTS13', $ESTS2[13]);
                                            $document->setValue('2ETTS14', $ESTS2[14]);
                                            $document->setValue('2ETTS15', $ESTS2[15]);
                                            $document->setValue('2ETTS16', $ESTS2[16]);

                                            //заповнення оцінок 2 семестру
                                            $document->setValue('2rating1', $Evaluation2[1]);
                                            $document->setValue('2rating2', $Evaluation2[2]);
                                            $document->setValue('2rating3', $Evaluation2[3]);
                                            $document->setValue('2rating4', $Evaluation2[4]);
                                            $document->setValue('2rating5', $Evaluation2[5]);
                                            $document->setValue('2rating6', $Evaluation2[6]);
                                            $document->setValue('2rating7', $Evaluation2[7]);
                                            $document->setValue('2rating8', $Evaluation2[8]);
                                            $document->setValue('2rating9', $Evaluation2[9]);
                                            $document->setValue('2rating10', $Evaluation2[10]);
                                            $document->setValue('2rating11', $Evaluation2[11]);
                                            $document->setValue('2rating12', $Evaluation2[12]);
                                            $document->setValue('2rating13', $Evaluation2[13]);
                                            $document->setValue('2rating14', $Evaluation2[14]);
                                            $document->setValue('2rating15', $Evaluation2[15]);
                                            $document->setValue('2rating16', $Evaluation2[16]);

                                            //заповнення дата 2 семестру
                                            $document->setValue('2date1', $data2[1]);
                                            $document->setValue('2date2', $data2[2]);
                                            $document->setValue('2date3', $data2[3]);
                                            $document->setValue('2date4', $data2[4]);
                                            $document->setValue('2date5', $data2[5]);
                                            $document->setValue('2date6', $data2[6]);
                                            $document->setValue('2date7', $data2[7]);
                                            $document->setValue('2date8', $data2[8]);
                                            $document->setValue('2date9', $data2[9]);
                                            $document->setValue('2date10', $data2[10]);
                                            $document->setValue('2date11', $data2[11]);
                                            $document->setValue('2date12', $data2[12]);
                                            $document->setValue('2date13', $data2[13]);
                                            $document->setValue('2date14', $data2[14]);
                                            $document->setValue('2date15', $data2[15]);
                                            $document->setValue('2date16', $data2[16]);

                                            //заповнення вчителів 2 семестру
                                            $document->setValue('2teacher1', $Teacher2[1]);
                                            $document->setValue('2teacher2', $Teacher2[2]);
                                            $document->setValue('2teacher3', $Teacher2[3]);
                                            $document->setValue('2teacher4', $Teacher2[4]);
                                            $document->setValue('2teacher5', $Teacher2[5]);
                                            $document->setValue('2teacher6', $Teacher2[6]);
                                            $document->setValue('2teacher7', $Teacher2[7]);
                                            $document->setValue('2teacher8', $Teacher2[8]);
                                            $document->setValue('2teacher9', $Teacher2[9]);
                                            $document->setValue('2teacher10', $Teacher2[10]);
                                            $document->setValue('2teacher11', $Teacher2[11]);
                                            $document->setValue('2teacher12', $Teacher2[12]);
                                            $document->setValue('2teacher13', $Teacher2[13]);
                                            $document->setValue('2teacher14', $Teacher2[14]);
                                            $document->setValue('2teacher15', $Teacher2[15]);
                                            $document->setValue('2teacher16', $Teacher2[16]);






////////////////////////////////////////////
///////////////////////////////////////////
//2СЕМЕСТР
//Заповнення 3 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=3 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet3[$num] = $row["name"];
    $hour3[$num] = $row["hour"];
    $ESTS3[$num] = $row["ESTS"];
    $Evaluation3[$num] = $row["Evaluation"];
    $data3[$num] = $row["data"];
    $Teacher3[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 3 семестру
                                            $document->setValue('3name1', $predmet3[1]);
                                            $document->setValue('3name2', $predmet3[2]);
                                            $document->setValue('3name3', $predmet3[3]);
                                            $document->setValue('3name4', $predmet3[4]);
                                            $document->setValue('3name5', $predmet3[5]);
                                            $document->setValue('3name6', $predmet3[6]);
                                            $document->setValue('3name7', $predmet3[7]);
                                            $document->setValue('3name8', $predmet3[8]);
                                            $document->setValue('3name9', $predmet3[9]);
                                            $document->setValue('3name10', $predmet3[10]);
                                            $document->setValue('3name11', $predmet3[11]);
                                            $document->setValue('3name12', $predmet3[12]);
                                            $document->setValue('3name13', $predmet3[13]);
                                            $document->setValue('3name14', $predmet3[14]);
                                            $document->setValue('3name15', $predmet3[15]);
                                            $document->setValue('3name16', $predmet3[16]);

                                            //заповнення годин 3 семестру
                                            $document->setValue('3hour1', $hour3[1]);
                                            $document->setValue('3hour2', $hour3[2]);
                                            $document->setValue('3hour3', $hour3[3]);
                                            $document->setValue('3hour4', $hour3[4]);
                                            $document->setValue('3hour5', $hour3[5]);
                                            $document->setValue('3hour6', $hour3[6]);
                                            $document->setValue('3hour7', $hour3[7]);
                                            $document->setValue('3hour8', $hour3[8]);
                                            $document->setValue('3hour9', $hour3[9]);
                                            $document->setValue('3hour10', $hour3[10]);
                                            $document->setValue('3hour11', $hour3[11]);
                                            $document->setValue('3hour12', $hour3[12]);
                                            $document->setValue('3hour13', $hour3[13]);
                                            $document->setValue('3hour14', $hour3[14]);
                                            $document->setValue('3hour15', $hour3[15]);
                                            $document->setValue('3hour16', $hour3[16]);

                                            //заповнення кредитів 3 семестру
                                            $document->setValue('3ETTS1', $ESTS3[1]);
                                            $document->setValue('3ETTS2', $ESTS3[2]);
                                            $document->setValue('3ETTS3', $ESTS3[3]);
                                            $document->setValue('3ETTS4', $ESTS3[4]);
                                            $document->setValue('3ETTS5', $ESTS3[5]);
                                            $document->setValue('3ETTS6', $ESTS3[6]);
                                            $document->setValue('3ETTS7', $ESTS3[7]);
                                            $document->setValue('3ETTS8', $ESTS3[8]);
                                            $document->setValue('3ETTS9', $ESTS3[9]);
                                            $document->setValue('3ETTS10', $ESTS3[10]);
                                            $document->setValue('3ETTS11', $ESTS3[11]);
                                            $document->setValue('3ETTS12', $ESTS3[12]);
                                            $document->setValue('3ETTS13', $ESTS3[13]);
                                            $document->setValue('3ETTS14', $ESTS3[14]);
                                            $document->setValue('3ETTS15', $ESTS3[15]);
                                            $document->setValue('3ETTS16', $ESTS3[16]);

                                            //заповнення оцінок 3 семестру
                                            $document->setValue('3rating1', $Evaluation3[1]);
                                            $document->setValue('3rating2', $Evaluation3[2]);
                                            $document->setValue('3rating3', $Evaluation3[3]);
                                            $document->setValue('3rating4', $Evaluation3[4]);
                                            $document->setValue('3rating5', $Evaluation3[5]);
                                            $document->setValue('3rating6', $Evaluation3[6]);
                                            $document->setValue('3rating7', $Evaluation3[7]);
                                            $document->setValue('3rating8', $Evaluation3[8]);
                                            $document->setValue('3rating9', $Evaluation3[9]);
                                            $document->setValue('3rating10', $Evaluation3[10]);
                                            $document->setValue('3rating11', $Evaluation3[11]);
                                            $document->setValue('3rating12', $Evaluation3[12]);
                                            $document->setValue('3rating13', $Evaluation3[13]);
                                            $document->setValue('3rating14', $Evaluation3[14]);
                                            $document->setValue('3rating15', $Evaluation3[15]);
                                            $document->setValue('3rating16', $Evaluation3[16]);

                                            //заповнення дата 3 семестру
                                            $document->setValue('3date1', $data3[1]);
                                            $document->setValue('3date2', $data3[2]);
                                            $document->setValue('3date3', $data3[3]);
                                            $document->setValue('3date4', $data3[4]);
                                            $document->setValue('3date5', $data3[5]);
                                            $document->setValue('3date6', $data3[6]);
                                            $document->setValue('3date7', $data3[7]);
                                            $document->setValue('3date8', $data3[8]);
                                            $document->setValue('3date9', $data3[9]);
                                            $document->setValue('3date10', $data3[10]);
                                            $document->setValue('3date11', $data3[11]);
                                            $document->setValue('3date12', $data3[12]);
                                            $document->setValue('3date13', $data3[13]);
                                            $document->setValue('3date14', $data3[14]);
                                            $document->setValue('3date15', $data3[15]);
                                            $document->setValue('3date16', $data3[16]);

                                            //заповнення вчителів 3 семестру
                                            $document->setValue('3teacher1', $Teacher3[1]);
                                            $document->setValue('3teacher2', $Teacher3[2]);
                                            $document->setValue('3teacher3', $Teacher3[3]);
                                            $document->setValue('3teacher4', $Teacher3[4]);
                                            $document->setValue('3teacher5', $Teacher3[5]);
                                            $document->setValue('3teacher6', $Teacher3[6]);
                                            $document->setValue('3teacher7', $Teacher3[7]);
                                            $document->setValue('3teacher8', $Teacher3[8]);
                                            $document->setValue('3teacher9', $Teacher3[9]);
                                            $document->setValue('3teacher10', $Teacher3[10]);
                                            $document->setValue('3teacher11', $Teacher3[11]);
                                            $document->setValue('3teacher12', $Teacher3[12]);
                                            $document->setValue('3teacher13', $Teacher3[13]);
                                            $document->setValue('3teacher14', $Teacher3[14]);
                                            $document->setValue('3teacher15', $Teacher3[15]);
                                            $document->setValue('3teacher16', $Teacher3[16]);















////////////////////////////////////////////
///////////////////////////////////////////
//2СЕМЕСТР
//Заповнення 4 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=4 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet4[$num] = $row["name"];
    $hour4[$num] = $row["hour"];
    $ESTS4[$num] = $row["ESTS"];
    $Evaluation4[$num] = $row["Evaluation"];
    $data4[$num] = $row["data"];
    $Teacher4[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 4 семестру
                                            $document->setValue('4name1', $predmet4[1]);
                                            $document->setValue('4name2', $predmet4[2]);
                                            $document->setValue('4name3', $predmet4[3]);
                                            $document->setValue('4name4', $predmet4[4]);
                                            $document->setValue('4name5', $predmet4[5]);
                                            $document->setValue('4name6', $predmet4[6]);
                                            $document->setValue('4name7', $predmet4[7]);
                                            $document->setValue('4name8', $predmet4[8]);
                                            $document->setValue('4name9', $predmet4[9]);
                                            $document->setValue('4name10', $predmet4[10]);
                                            $document->setValue('4name11', $predmet4[11]);
                                            $document->setValue('4name12', $predmet4[12]);
                                            $document->setValue('4name13', $predmet4[13]);
                                            $document->setValue('4name14', $predmet4[14]);
                                            $document->setValue('4name15', $predmet4[15]);
                                            $document->setValue('4name16', $predmet4[16]);

                                            //заповнення годин 4 семестру
                                            $document->setValue('4hour1', $hour4[1]);
                                            $document->setValue('4hour2', $hour4[2]);
                                            $document->setValue('4hour3', $hour4[3]);
                                            $document->setValue('4hour4', $hour4[4]);
                                            $document->setValue('4hour5', $hour4[5]);
                                            $document->setValue('4hour6', $hour4[6]);
                                            $document->setValue('4hour7', $hour4[7]);
                                            $document->setValue('4hour8', $hour4[8]);
                                            $document->setValue('4hour9', $hour4[9]);
                                            $document->setValue('4hour10', $hour4[10]);
                                            $document->setValue('4hour11', $hour4[11]);
                                            $document->setValue('4hour12', $hour4[12]);
                                            $document->setValue('4hour13', $hour4[13]);
                                            $document->setValue('4hour14', $hour4[14]);
                                            $document->setValue('4hour15', $hour4[15]);
                                            $document->setValue('4hour16', $hour4[16]);

                                            //заповнення кредитів 4 семестру
                                            $document->setValue('4ETTS1', $ESTS4[1]);
                                            $document->setValue('4ETTS2', $ESTS4[2]);
                                            $document->setValue('4ETTS3', $ESTS4[3]);
                                            $document->setValue('4ETTS4', $ESTS4[4]);
                                            $document->setValue('4ETTS5', $ESTS4[5]);
                                            $document->setValue('4ETTS6', $ESTS4[6]);
                                            $document->setValue('4ETTS7', $ESTS4[7]);
                                            $document->setValue('4ETTS8', $ESTS4[8]);
                                            $document->setValue('4ETTS9', $ESTS4[9]);
                                            $document->setValue('4ETTS10', $ESTS4[10]);
                                            $document->setValue('4ETTS11', $ESTS4[11]);
                                            $document->setValue('4ETTS12', $ESTS4[12]);
                                            $document->setValue('4ETTS13', $ESTS4[13]);
                                            $document->setValue('4ETTS14', $ESTS4[14]);
                                            $document->setValue('4ETTS15', $ESTS4[15]);
                                            $document->setValue('4ETTS16', $ESTS4[16]);

                                            //заповнення оцінок 4 семестру
                                            $document->setValue('4rating1', $Evaluation4[1]);
                                            $document->setValue('4rating2', $Evaluation4[2]);
                                            $document->setValue('4rating3', $Evaluation4[3]);
                                            $document->setValue('4rating4', $Evaluation4[4]);
                                            $document->setValue('4rating5', $Evaluation4[5]);
                                            $document->setValue('4rating6', $Evaluation4[6]);
                                            $document->setValue('4rating7', $Evaluation4[7]);
                                            $document->setValue('4rating8', $Evaluation4[8]);
                                            $document->setValue('4rating9', $Evaluation4[9]);
                                            $document->setValue('4rating10', $Evaluation4[10]);
                                            $document->setValue('4rating11', $Evaluation4[11]);
                                            $document->setValue('4rating12', $Evaluation4[12]);
                                            $document->setValue('4rating13', $Evaluation4[13]);
                                            $document->setValue('4rating14', $Evaluation4[14]);
                                            $document->setValue('4rating15', $Evaluation4[15]);
                                            $document->setValue('4rating16', $Evaluation4[16]);

                                            //заповнення дата 4 семестру
                                            $document->setValue('4date1', $data4[1]);
                                            $document->setValue('4date2', $data4[2]);
                                            $document->setValue('4date3', $data4[3]);
                                            $document->setValue('4date4', $data4[4]);
                                            $document->setValue('4date5', $data4[5]);
                                            $document->setValue('4date6', $data4[6]);
                                            $document->setValue('4date7', $data4[7]);
                                            $document->setValue('4date8', $data4[8]);
                                            $document->setValue('4date9', $data4[9]);
                                            $document->setValue('4date10', $data4[10]);
                                            $document->setValue('4date11', $data4[11]);
                                            $document->setValue('4date12', $data4[12]);
                                            $document->setValue('4date13', $data4[13]);
                                            $document->setValue('4date14', $data4[14]);
                                            $document->setValue('4date15', $data4[15]);
                                            $document->setValue('4date16', $data4[16]);

                                            //заповнення вчителів 4 семестру
                                            $document->setValue('4teacher1', $Teacher4[1]);
                                            $document->setValue('4teacher2', $Teacher4[2]);
                                            $document->setValue('4teacher3', $Teacher4[3]);
                                            $document->setValue('4teacher4', $Teacher4[4]);
                                            $document->setValue('4teacher5', $Teacher4[5]);
                                            $document->setValue('4teacher6', $Teacher4[6]);
                                            $document->setValue('4teacher7', $Teacher4[7]);
                                            $document->setValue('4teacher8', $Teacher4[8]);
                                            $document->setValue('4teacher9', $Teacher4[9]);
                                            $document->setValue('4teacher10', $Teacher4[10]);
                                            $document->setValue('4teacher11', $Teacher4[11]);
                                            $document->setValue('4teacher12', $Teacher4[12]);
                                            $document->setValue('4teacher13', $Teacher4[13]);
                                            $document->setValue('4teacher14', $Teacher4[14]);
                                            $document->setValue('4teacher15', $Teacher4[15]);
                                            $document->setValue('4teacher16', $Teacher4[16]);









////////////////////////////////////////////
///////////////////////////////////////////
//1СЕМЕСТР
//Заповнення 5 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=5 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet5[$num] = $row["name"];
    $hour5[$num] = $row["hour"];
    $ESTS5[$num] = $row["ESTS"];
    $Evaluation5[$num] = $row["Evaluation"];
    $data5[$num] = $row["data"];
    $Teacher5[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 5 семестру
                                            $document->setValue('5name1', $predmet5[1]);
                                            $document->setValue('5name2', $predmet5[2]);
                                            $document->setValue('5name3', $predmet5[3]);
                                            $document->setValue('5name4', $predmet5[4]);
                                            $document->setValue('5name5', $predmet5[5]);
                                            $document->setValue('5name6', $predmet5[6]);
                                            $document->setValue('5name7', $predmet5[7]);
                                            $document->setValue('5name8', $predmet5[8]);
                                            $document->setValue('5name9', $predmet5[9]);
                                            $document->setValue('5name10', $predmet5[10]);
                                            $document->setValue('5name11', $predmet5[11]);
                                            $document->setValue('5name12', $predmet5[12]);
                                            $document->setValue('5name13', $predmet5[13]);
                                            $document->setValue('5name14', $predmet5[14]);
                                            $document->setValue('5name15', $predmet5[15]);
                                            $document->setValue('5name16', $predmet5[16]);

                                            //заповнення годин 5 семестру
                                            $document->setValue('5hour1', $hour5[1]);
                                            $document->setValue('5hour2', $hour5[2]);
                                            $document->setValue('5hour3', $hour5[3]);
                                            $document->setValue('5hour4', $hour5[4]);
                                            $document->setValue('5hour5', $hour5[5]);
                                            $document->setValue('5hour6', $hour5[6]);
                                            $document->setValue('5hour7', $hour5[7]);
                                            $document->setValue('5hour8', $hour5[8]);
                                            $document->setValue('5hour9', $hour5[9]);
                                            $document->setValue('5hour10', $hour5[10]);
                                            $document->setValue('5hour11', $hour5[11]);
                                            $document->setValue('5hour12', $hour5[12]);
                                            $document->setValue('5hour13', $hour5[13]);
                                            $document->setValue('5hour14', $hour5[14]);
                                            $document->setValue('5hour15', $hour5[15]);
                                            $document->setValue('5hour16', $hour5[16]);

                                            //заповнення кредитів 5 семестру
                                            $document->setValue('5ETTS1', $ESTS5[1]);
                                            $document->setValue('5ETTS2', $ESTS5[2]);
                                            $document->setValue('5ETTS3', $ESTS5[3]);
                                            $document->setValue('5ETTS4', $ESTS5[4]);
                                            $document->setValue('5ETTS5', $ESTS5[5]);
                                            $document->setValue('5ETTS6', $ESTS5[6]);
                                            $document->setValue('5ETTS7', $ESTS5[7]);
                                            $document->setValue('5ETTS8', $ESTS5[8]);
                                            $document->setValue('5ETTS9', $ESTS5[9]);
                                            $document->setValue('5ETTS10', $ESTS5[10]);
                                            $document->setValue('5ETTS11', $ESTS5[11]);
                                            $document->setValue('5ETTS12', $ESTS5[12]);
                                            $document->setValue('5ETTS13', $ESTS5[13]);
                                            $document->setValue('5ETTS14', $ESTS5[14]);
                                            $document->setValue('5ETTS15', $ESTS5[15]);
                                            $document->setValue('5ETTS16', $ESTS5[16]);

                                            //заповнення оцінок 5 семестру
                                            $document->setValue('5rating1', $Evaluation5[1]);
                                            $document->setValue('5rating2', $Evaluation5[2]);
                                            $document->setValue('5rating3', $Evaluation5[3]);
                                            $document->setValue('5rating4', $Evaluation5[4]);
                                            $document->setValue('5rating5', $Evaluation5[5]);
                                            $document->setValue('5rating6', $Evaluation5[6]);
                                            $document->setValue('5rating7', $Evaluation5[7]);
                                            $document->setValue('5rating8', $Evaluation5[8]);
                                            $document->setValue('5rating9', $Evaluation5[9]);
                                            $document->setValue('5rating10', $Evaluation5[10]);
                                            $document->setValue('5rating11', $Evaluation5[11]);
                                            $document->setValue('5rating12', $Evaluation5[12]);
                                            $document->setValue('5rating13', $Evaluation5[13]);
                                            $document->setValue('5rating14', $Evaluation5[14]);
                                            $document->setValue('5rating15', $Evaluation5[15]);
                                            $document->setValue('5rating16', $Evaluation5[16]);

                                            //заповнення дата 5 семестру
                                            $document->setValue('5date1', $data5[1]);
                                            $document->setValue('5date2', $data5[2]);
                                            $document->setValue('5date3', $data5[3]);
                                            $document->setValue('5date4', $data5[4]);
                                            $document->setValue('5date5', $data5[5]);
                                            $document->setValue('5date6', $data5[6]);
                                            $document->setValue('5date7', $data5[7]);
                                            $document->setValue('5date8', $data5[8]);
                                            $document->setValue('5date9', $data5[9]);
                                            $document->setValue('5date10', $data5[10]);
                                            $document->setValue('5date11', $data5[11]);
                                            $document->setValue('5date12', $data5[12]);
                                            $document->setValue('5date13', $data5[13]);
                                            $document->setValue('5date14', $data5[14]);
                                            $document->setValue('5date15', $data5[15]);
                                            $document->setValue('5date16', $data5[16]);

                                            //заповнення вчителів 5 семестру
                                            $document->setValue('5teacher1', $Teacher5[1]);
                                            $document->setValue('5teacher2', $Teacher5[2]);
                                            $document->setValue('5teacher3', $Teacher5[3]);
                                            $document->setValue('5teacher4', $Teacher5[4]);
                                            $document->setValue('5teacher5', $Teacher5[5]);
                                            $document->setValue('5teacher6', $Teacher5[6]);
                                            $document->setValue('5teacher7', $Teacher5[7]);
                                            $document->setValue('5teacher8', $Teacher5[8]);
                                            $document->setValue('5teacher9', $Teacher5[9]);
                                            $document->setValue('5teacher10', $Teacher5[10]);
                                            $document->setValue('5teacher11', $Teacher5[11]);
                                            $document->setValue('5teacher12', $Teacher5[12]);
                                            $document->setValue('5teacher13', $Teacher5[13]);
                                            $document->setValue('5teacher14', $Teacher5[14]);
                                            $document->setValue('5teacher15', $Teacher5[15]);
                                            $document->setValue('5teacher16', $Teacher5[16]);








////////////////////////////////////////////
///////////////////////////////////////////
//3СЕМЕСТР
//Заповнення 6 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=6 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet6[$num] = $row["name"];
    $hour6[$num] = $row["hour"];
    $ESTS6[$num] = $row["ESTS"];
    $Evaluation6[$num] = $row["Evaluation"];
    $data6[$num] = $row["data"];
    $Teacher6[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 6 семестру
                                            $document->setValue('6name1', $predmet6[1]);
                                            $document->setValue('6name2', $predmet6[2]);
                                            $document->setValue('6name3', $predmet6[3]);
                                            $document->setValue('6name4', $predmet6[4]);
                                            $document->setValue('6name5', $predmet6[5]);
                                            $document->setValue('6name6', $predmet6[6]);
                                            $document->setValue('6name7', $predmet6[7]);
                                            $document->setValue('6name8', $predmet6[8]);
                                            $document->setValue('6name9', $predmet6[9]);
                                            $document->setValue('6name10', $predmet6[10]);
                                            $document->setValue('6name11', $predmet6[11]);
                                            $document->setValue('6name12', $predmet6[12]);
                                            $document->setValue('6name13', $predmet6[13]);
                                            $document->setValue('6name14', $predmet6[14]);
                                            $document->setValue('6name15', $predmet6[15]);
                                            $document->setValue('6name16', $predmet6[16]);

                                            //заповнення годин 6 семестру
                                            $document->setValue('6hour1', $hour6[1]);
                                            $document->setValue('6hour2', $hour6[2]);
                                            $document->setValue('6hour3', $hour6[3]);
                                            $document->setValue('6hour4', $hour6[4]);
                                            $document->setValue('6hour5', $hour6[5]);
                                            $document->setValue('6hour6', $hour6[6]);
                                            $document->setValue('6hour7', $hour6[7]);
                                            $document->setValue('6hour8', $hour6[8]);
                                            $document->setValue('6hour9', $hour6[9]);
                                            $document->setValue('6hour10', $hour6[10]);
                                            $document->setValue('6hour11', $hour6[11]);
                                            $document->setValue('6hour12', $hour6[12]);
                                            $document->setValue('6hour13', $hour6[13]);
                                            $document->setValue('6hour14', $hour6[14]);
                                            $document->setValue('6hour15', $hour6[15]);
                                            $document->setValue('6hour16', $hour6[16]);

                                            //заповнення кредитів 6 семестру
                                            $document->setValue('6ETTS1', $ESTS6[1]);
                                            $document->setValue('6ETTS2', $ESTS6[2]);
                                            $document->setValue('6ETTS3', $ESTS6[3]);
                                            $document->setValue('6ETTS4', $ESTS6[4]);
                                            $document->setValue('6ETTS5', $ESTS6[5]);
                                            $document->setValue('6ETTS6', $ESTS6[6]);
                                            $document->setValue('6ETTS7', $ESTS6[7]);
                                            $document->setValue('6ETTS8', $ESTS6[8]);
                                            $document->setValue('6ETTS9', $ESTS6[9]);
                                            $document->setValue('6ETTS10', $ESTS6[10]);
                                            $document->setValue('6ETTS11', $ESTS6[11]);
                                            $document->setValue('6ETTS12', $ESTS6[12]);
                                            $document->setValue('6ETTS13', $ESTS6[13]);
                                            $document->setValue('6ETTS14', $ESTS6[14]);
                                            $document->setValue('6ETTS15', $ESTS6[15]);
                                            $document->setValue('6ETTS16', $ESTS6[16]);

                                            //заповнення оцінок 6 семестру
                                            $document->setValue('6rating1', $Evaluation6[1]);
                                            $document->setValue('6rating2', $Evaluation6[2]);
                                            $document->setValue('6rating3', $Evaluation6[3]);
                                            $document->setValue('6rating4', $Evaluation6[4]);
                                            $document->setValue('6rating5', $Evaluation6[5]);
                                            $document->setValue('6rating6', $Evaluation6[6]);
                                            $document->setValue('6rating7', $Evaluation6[7]);
                                            $document->setValue('6rating8', $Evaluation6[8]);
                                            $document->setValue('6rating9', $Evaluation6[9]);
                                            $document->setValue('6rating10', $Evaluation6[10]);
                                            $document->setValue('6rating11', $Evaluation6[11]);
                                            $document->setValue('6rating12', $Evaluation6[12]);
                                            $document->setValue('6rating13', $Evaluation6[13]);
                                            $document->setValue('6rating14', $Evaluation6[14]);
                                            $document->setValue('6rating15', $Evaluation6[15]);
                                            $document->setValue('6rating16', $Evaluation6[16]);

                                            //заповнення дата 6 семестру
                                            $document->setValue('6date1', $data6[1]);
                                            $document->setValue('6date2', $data6[2]);
                                            $document->setValue('6date3', $data6[3]);
                                            $document->setValue('6date4', $data6[4]);
                                            $document->setValue('6date5', $data6[5]);
                                            $document->setValue('6date6', $data6[6]);
                                            $document->setValue('6date7', $data6[7]);
                                            $document->setValue('6date8', $data6[8]);
                                            $document->setValue('6date9', $data6[9]);
                                            $document->setValue('6date10', $data6[10]);
                                            $document->setValue('6date11', $data6[11]);
                                            $document->setValue('6date12', $data6[12]);
                                            $document->setValue('6date13', $data6[13]);
                                            $document->setValue('6date14', $data6[14]);
                                            $document->setValue('6date15', $data6[15]);
                                            $document->setValue('6date16', $data6[16]);

                                            //заповнення вчителів 6 семестру
                                            $document->setValue('6teacher1', $Teacher6[1]);
                                            $document->setValue('6teacher2', $Teacher6[2]);
                                            $document->setValue('6teacher3', $Teacher6[3]);
                                            $document->setValue('6teacher4', $Teacher6[4]);
                                            $document->setValue('6teacher5', $Teacher6[5]);
                                            $document->setValue('6teacher6', $Teacher6[6]);
                                            $document->setValue('6teacher7', $Teacher6[7]);
                                            $document->setValue('6teacher8', $Teacher6[8]);
                                            $document->setValue('6teacher9', $Teacher6[9]);
                                            $document->setValue('6teacher10', $Teacher6[10]);
                                            $document->setValue('6teacher11', $Teacher6[11]);
                                            $document->setValue('6teacher12', $Teacher6[12]);
                                            $document->setValue('6teacher13', $Teacher6[13]);
                                            $document->setValue('6teacher14', $Teacher6[14]);
                                            $document->setValue('6teacher15', $Teacher6[15]);
                                            $document->setValue('6teacher16', $Teacher6[16]);









////////////////////////////////////////////
///////////////////////////////////////////
//4СЕМЕСТР
//Заповнення 7 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=7 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet7[$num] = $row["name"];
    $hour7[$num] = $row["hour"];
    $ESTS7[$num] = $row["ESTS"];
    $Evaluation7[$num] = $row["Evaluation"];
    $data7[$num] = $row["data"];
    $Teacher7[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 7 семестру
                                            $document->setValue('7name1', $predmet7[1]);
                                            $document->setValue('7name2', $predmet7[2]);
                                            $document->setValue('7name3', $predmet7[3]);
                                            $document->setValue('7name4', $predmet7[4]);
                                            $document->setValue('7name5', $predmet7[5]);
                                            $document->setValue('7name6', $predmet7[6]);
                                            $document->setValue('7name7', $predmet7[7]);
                                            $document->setValue('7name8', $predmet7[8]);
                                            $document->setValue('7name9', $predmet7[9]);
                                            $document->setValue('7name10', $predmet7[10]);
                                            $document->setValue('7name11', $predmet7[11]);
                                            $document->setValue('7name12', $predmet7[12]);
                                            $document->setValue('7name13', $predmet7[13]);
                                            $document->setValue('7name14', $predmet7[14]);
                                            $document->setValue('7name15', $predmet7[15]);
                                            $document->setValue('7name16', $predmet7[16]);

                                            //заповнення годин 7 семестру
                                            $document->setValue('7hour1', $hour7[1]);
                                            $document->setValue('7hour2', $hour7[2]);
                                            $document->setValue('7hour3', $hour7[3]);
                                            $document->setValue('7hour4', $hour7[4]);
                                            $document->setValue('7hour5', $hour7[5]);
                                            $document->setValue('7hour6', $hour7[6]);
                                            $document->setValue('7hour7', $hour7[7]);
                                            $document->setValue('7hour8', $hour7[8]);
                                            $document->setValue('7hour9', $hour7[9]);
                                            $document->setValue('7hour10', $hour7[10]);
                                            $document->setValue('7hour11', $hour7[11]);
                                            $document->setValue('7hour12', $hour7[12]);
                                            $document->setValue('7hour13', $hour7[13]);
                                            $document->setValue('7hour14', $hour7[14]);
                                            $document->setValue('7hour15', $hour7[15]);
                                            $document->setValue('7hour16', $hour7[16]);

                                            //заповнення кредитів 7 семестру
                                            $document->setValue('7ETTS1', $ESTS7[1]);
                                            $document->setValue('7ETTS2', $ESTS7[2]);
                                            $document->setValue('7ETTS3', $ESTS7[3]);
                                            $document->setValue('7ETTS4', $ESTS7[4]);
                                            $document->setValue('7ETTS5', $ESTS7[5]);
                                            $document->setValue('7ETTS6', $ESTS7[6]);
                                            $document->setValue('7ETTS7', $ESTS7[7]);
                                            $document->setValue('7ETTS8', $ESTS7[8]);
                                            $document->setValue('7ETTS9', $ESTS7[9]);
                                            $document->setValue('7ETTS10', $ESTS7[10]);
                                            $document->setValue('7ETTS11', $ESTS7[11]);
                                            $document->setValue('7ETTS12', $ESTS7[12]);
                                            $document->setValue('7ETTS13', $ESTS7[13]);
                                            $document->setValue('7ETTS14', $ESTS7[14]);
                                            $document->setValue('7ETTS15', $ESTS7[15]);
                                            $document->setValue('7ETTS16', $ESTS7[16]);

                                            //заповнення оцінок 7 семестру
                                            $document->setValue('7rating1', $Evaluation7[1]);
                                            $document->setValue('7rating2', $Evaluation7[2]);
                                            $document->setValue('7rating3', $Evaluation7[3]);
                                            $document->setValue('7rating4', $Evaluation7[4]);
                                            $document->setValue('7rating5', $Evaluation7[5]);
                                            $document->setValue('7rating6', $Evaluation7[6]);
                                            $document->setValue('7rating7', $Evaluation7[7]);
                                            $document->setValue('7rating8', $Evaluation7[8]);
                                            $document->setValue('7rating9', $Evaluation7[9]);
                                            $document->setValue('7rating10', $Evaluation7[10]);
                                            $document->setValue('7rating11', $Evaluation7[11]);
                                            $document->setValue('7rating12', $Evaluation7[12]);
                                            $document->setValue('7rating13', $Evaluation7[13]);
                                            $document->setValue('7rating14', $Evaluation7[14]);
                                            $document->setValue('7rating15', $Evaluation7[15]);
                                            $document->setValue('7rating16', $Evaluation7[16]);

                                            //заповнення дата 7 семестру
                                            $document->setValue('7date1', $data7[1]);
                                            $document->setValue('7date2', $data7[2]);
                                            $document->setValue('7date3', $data7[3]);
                                            $document->setValue('7date4', $data7[4]);
                                            $document->setValue('7date5', $data7[5]);
                                            $document->setValue('7date6', $data7[6]);
                                            $document->setValue('7date7', $data7[7]);
                                            $document->setValue('7date8', $data7[8]);
                                            $document->setValue('7date9', $data7[9]);
                                            $document->setValue('7date10', $data7[10]);
                                            $document->setValue('7date11', $data7[11]);
                                            $document->setValue('7date12', $data7[12]);
                                            $document->setValue('7date13', $data7[13]);
                                            $document->setValue('7date14', $data7[14]);
                                            $document->setValue('7date15', $data7[15]);
                                            $document->setValue('7date16', $data7[16]);

                                            //заповнення вчителів 7 семестру
                                            $document->setValue('7teacher1', $Teacher7[1]);
                                            $document->setValue('7teacher2', $Teacher7[2]);
                                            $document->setValue('7teacher3', $Teacher7[3]);
                                            $document->setValue('7teacher4', $Teacher7[4]);
                                            $document->setValue('7teacher5', $Teacher7[5]);
                                            $document->setValue('7teacher6', $Teacher7[6]);
                                            $document->setValue('7teacher7', $Teacher7[7]);
                                            $document->setValue('7teacher8', $Teacher7[8]);
                                            $document->setValue('7teacher9', $Teacher7[9]);
                                            $document->setValue('7teacher10', $Teacher7[10]);
                                            $document->setValue('7teacher11', $Teacher7[11]);
                                            $document->setValue('7teacher12', $Teacher7[12]);
                                            $document->setValue('7teacher13', $Teacher7[13]);
                                            $document->setValue('7teacher14', $Teacher7[14]);
                                            $document->setValue('7teacher15', $Teacher7[15]);
                                            $document->setValue('7teacher16', $Teacher7[16]);







////////////////////////////////////////////
///////////////////////////////////////////
//4СЕМЕСТР
//Заповнення 8 семестру сторінки
////////////////////////////////////////////
///////////////////////////////////////////
$num =1;
$semestr8 = $connect->query("SELECT ty.`id_Subjects`, ty.`name`, ty.`id_ group`, ty.`hour`, ty.`ESTS`, ty.`Teacher`, ty.`id_semestr`, tu.`Evaluation`,tu.`data` FROM `subjects`ty ,`evaluation` tu WHERE ty.`id_semestr`=8 and `id_ group`=(SELECT tn.`id_ group` FROM `students`t, `groups` tn WHERE t.`id_ group`=tn.`id_ group` and t.`id_Students`=$Students) and tu.`id_Students`=$Students and ty.`id_Subjects`=tu.`id_Subjects` ORDER BY ty.`name`");
while ($row = $semestr8->fetch_assoc()) {
    $predmet8[$num] = $row["name"];
    $hour8[$num] = $row["hour"];
    $ESTS8[$num] = $row["ESTS"];
    $Evaluation8[$num] = $row["Evaluation"];
    $data8[$num] = $row["data"];
    $Teacher8[$num] = $row["Teacher"];
    $num++;
}
                                            //заповнення назви пердметів 8 семестру
                                            $document->setValue('8name1', $predmet8[1]);
                                            $document->setValue('8name2', $predmet8[2]);
                                            $document->setValue('8name3', $predmet8[3]);
                                            $document->setValue('8name4', $predmet8[4]);
                                            $document->setValue('8name5', $predmet8[5]);
                                            $document->setValue('8name6', $predmet8[6]);
                                            $document->setValue('8name7', $predmet8[7]);
                                            $document->setValue('8name8', $predmet8[8]);
                                            $document->setValue('8name9', $predmet8[9]);
                                            $document->setValue('8name10', $predmet8[10]);
                                            $document->setValue('8name11', $predmet8[11]);
                                            $document->setValue('8name12', $predmet8[12]);
                                            $document->setValue('8name13', $predmet8[13]);
                                            $document->setValue('8name14', $predmet8[14]);
                                            $document->setValue('8name15', $predmet8[15]);
                                            $document->setValue('8name16', $predmet8[16]);

                                            //заповнення годин 8 семестру
                                            $document->setValue('8hour1', $hour8[1]);
                                            $document->setValue('8hour2', $hour8[2]);
                                            $document->setValue('8hour3', $hour8[3]);
                                            $document->setValue('8hour4', $hour8[4]);
                                            $document->setValue('8hour5', $hour8[5]);
                                            $document->setValue('8hour6', $hour8[6]);
                                            $document->setValue('8hour7', $hour8[7]);
                                            $document->setValue('8hour8', $hour8[8]);
                                            $document->setValue('8hour9', $hour8[9]);
                                            $document->setValue('8hour10', $hour8[10]);
                                            $document->setValue('8hour11', $hour8[11]);
                                            $document->setValue('8hour12', $hour8[12]);
                                            $document->setValue('8hour13', $hour8[13]);
                                            $document->setValue('8hour14', $hour8[14]);
                                            $document->setValue('8hour15', $hour8[15]);
                                            $document->setValue('8hour16', $hour8[16]);

                                            //заповнення кредитів 8 семестру
                                            $document->setValue('8ETTS1', $ESTS8[1]);
                                            $document->setValue('8ETTS2', $ESTS8[2]);
                                            $document->setValue('8ETTS3', $ESTS8[3]);
                                            $document->setValue('8ETTS4', $ESTS8[4]);
                                            $document->setValue('8ETTS5', $ESTS8[5]);
                                            $document->setValue('8ETTS6', $ESTS8[6]);
                                            $document->setValue('8ETTS7', $ESTS8[7]);
                                            $document->setValue('8ETTS8', $ESTS8[8]);
                                            $document->setValue('8ETTS9', $ESTS8[9]);
                                            $document->setValue('8ETTS10', $ESTS8[10]);
                                            $document->setValue('8ETTS11', $ESTS8[11]);
                                            $document->setValue('8ETTS12', $ESTS8[12]);
                                            $document->setValue('8ETTS13', $ESTS8[13]);
                                            $document->setValue('8ETTS14', $ESTS8[14]);
                                            $document->setValue('8ETTS15', $ESTS8[15]);
                                            $document->setValue('8ETTS16', $ESTS8[16]);

                                            //заповнення оцінок 8 семестру
                                            $document->setValue('8rating1', $Evaluation8[1]);
                                            $document->setValue('8rating2', $Evaluation8[2]);
                                            $document->setValue('8rating3', $Evaluation8[3]);
                                            $document->setValue('8rating4', $Evaluation8[4]);
                                            $document->setValue('8rating5', $Evaluation8[5]);
                                            $document->setValue('8rating6', $Evaluation8[6]);
                                            $document->setValue('8rating7', $Evaluation8[7]);
                                            $document->setValue('8rating8', $Evaluation8[8]);
                                            $document->setValue('8rating9', $Evaluation8[9]);
                                            $document->setValue('8rating10', $Evaluation8[10]);
                                            $document->setValue('8rating11', $Evaluation8[11]);
                                            $document->setValue('8rating12', $Evaluation8[12]);
                                            $document->setValue('8rating13', $Evaluation8[13]);
                                            $document->setValue('8rating14', $Evaluation8[14]);
                                            $document->setValue('8rating15', $Evaluation8[15]);
                                            $document->setValue('8rating16', $Evaluation8[16]);

                                            //заповнення дата 8 семестру
                                            $document->setValue('8date1', $data8[1]);
                                            $document->setValue('8date2', $data8[2]);
                                            $document->setValue('8date3', $data8[3]);
                                            $document->setValue('8date4', $data8[4]);
                                            $document->setValue('8date5', $data8[5]);
                                            $document->setValue('8date6', $data8[6]);
                                            $document->setValue('8date7', $data8[7]);
                                            $document->setValue('8date8', $data8[8]);
                                            $document->setValue('8date9', $data8[9]);
                                            $document->setValue('8date10', $data8[10]);
                                            $document->setValue('8date11', $data8[11]);
                                            $document->setValue('8date12', $data8[12]);
                                            $document->setValue('8date13', $data8[13]);
                                            $document->setValue('8date14', $data8[14]);
                                            $document->setValue('8date15', $data8[15]);
                                            $document->setValue('8date16', $data8[16]);

                                            //заповнення вчителів 8 семестру
                                            $document->setValue('8teacher1', $Teacher8[1]);
                                            $document->setValue('8teacher2', $Teacher8[2]);
                                            $document->setValue('8teacher3', $Teacher8[3]);
                                            $document->setValue('8teacher4', $Teacher8[4]);
                                            $document->setValue('8teacher5', $Teacher8[5]);
                                            $document->setValue('8teacher6', $Teacher8[6]);
                                            $document->setValue('8teacher7', $Teacher8[7]);
                                            $document->setValue('8teacher8', $Teacher8[8]);
                                            $document->setValue('8teacher9', $Teacher8[9]);
                                            $document->setValue('8teacher10', $Teacher8[10]);
                                            $document->setValue('8teacher11', $Teacher8[11]);
                                            $document->setValue('8teacher12', $Teacher8[12]);
                                            $document->setValue('8teacher13', $Teacher8[13]);
                                            $document->setValue('8teacher14', $Teacher8[14]);
                                            $document->setValue('8teacher15', $Teacher8[15]);
                                            $document->setValue('8teacher16', $Teacher8[16]);

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
/////Практична підготовка////////////////////////////////////
/////////////////////////////////////////////////////////////
$num =1;
$qvery3 = $connect->query("SELECT `id_practice`, `name`, `id_kurse`, `id_semestr`, `beginning`, `end`, `hour`, `nameteacher`, `rating`, `date`, `id_Students` FROM `practice` WHERE `id_Students`=$Students");
while ($row3 = $qvery3->fetch_assoc()) {
    $Pnum[$num] = $num;
    $Pname[$num] = $row3["name"];
    $Pkurse[$num] = $row3["id_kurse"];
    $Pznak[$num] = "/";
    $Psemestr[$num] = $row3["id_semestr"];
    $Pbeginning[$num] = $row3["beginning"];
    $Pend[$num] = $row3["end"];
    $Phour[$num] = $row3["hour"];
    $Pnameteacher[$num] = $row3["nameteacher"];
    $Prating[$num] = $row3["rating"];
    $Pdate[$num] = $row3["date"];
    $num++;
}
$document->setValue('Pnum1', $Pnum[1]);
$document->setValue('Pnum2', $Pnum[2]);
$document->setValue('Pnum3', $Pnum[3]);
$document->setValue('Pnum4', $Pnum[4]);
$document->setValue('Pnum5', $Pnum[5]);
$document->setValue('Pnum6', $Pnum[6]);
$document->setValue('Pnum7', $Pnum[7]);
$document->setValue('Pnum8', $Pnum[8]);
$document->setValue('Pnum9', $Pnum[9]);

$document->setValue('Pname1', $Pname[1]);
$document->setValue('Pname2', $Pname[2]);
$document->setValue('Pname3', $Pname[3]);
$document->setValue('Pname4', $Pname[4]);
$document->setValue('Pname5', $Pname[5]);
$document->setValue('Pname6', $Pname[6]);
$document->setValue('Pname7', $Pname[7]);
$document->setValue('Pname8', $Pname[8]);
$document->setValue('Pname9', $Pname[9]);

$document->setValue('Pkurse1', $Pkurse[1]);
$document->setValue('Pkurse2', $Pkurse[2]);
$document->setValue('Pkurse3', $Pkurse[3]);
$document->setValue('Pkurse4', $Pkurse[4]);
$document->setValue('Pkurse5', $Pkurse[5]);
$document->setValue('Pkurse6', $Pkurse[6]);
$document->setValue('Pkurse7', $Pkurse[7]);
$document->setValue('Pkurse8', $Pkurse[8]);
$document->setValue('Pkurse9', $Pkurse[9]);

$document->setValue('Pznak1', $Pznak[1]);
$document->setValue('Pznak2', $Pznak[2]);
$document->setValue('Pznak3', $Pznak[3]);
$document->setValue('Pznak4', $Pznak[4]);
$document->setValue('Pznak5', $Pznak[5]);
$document->setValue('Pznak6', $Pznak[6]);
$document->setValue('Pznak7', $Pznak[7]);
$document->setValue('Pznak8', $Pznak[8]);
$document->setValue('Pznak9', $Pznak[9]);

$document->setValue('Psemestr1', $Psemestr[1]);
$document->setValue('Psemestr2', $Psemestr[2]);
$document->setValue('Psemestr3', $Psemestr[3]);
$document->setValue('Psemestr4', $Psemestr[4]);
$document->setValue('Psemestr5', $Psemestr[5]);
$document->setValue('Psemestr6', $Psemestr[6]);
$document->setValue('Psemestr7', $Psemestr[7]);
$document->setValue('Psemestr8', $Psemestr[8]);
$document->setValue('Psemestr9', $Psemestr[9]);

$document->setValue('Pbeginning1', $Pbeginning[1]);
$document->setValue('Pbeginning2', $Pbeginning[2]);
$document->setValue('Pbeginning3', $Pbeginning[3]);
$document->setValue('Pbeginning4', $Pbeginning[4]);
$document->setValue('Pbeginning5', $Pbeginning[5]);
$document->setValue('Pbeginning6', $Pbeginning[6]);
$document->setValue('Pbeginning7', $Pbeginning[7]);
$document->setValue('Pbeginning8', $Pbeginning[8]);
$document->setValue('Pbeginning9', $Pbeginning[9]);

$document->setValue('Pend1', $Pend[1]);
$document->setValue('Pend2', $Pend[2]);
$document->setValue('Pend3', $Pend[3]);
$document->setValue('Pend4', $Pend[4]);
$document->setValue('Pend5', $Pend[5]);
$document->setValue('Pend6', $Pend[6]);
$document->setValue('Pend7', $Pend[7]);
$document->setValue('Pend8', $Pend[8]);
$document->setValue('Pend9', $Pend[9]);

$document->setValue('Phour1', $Phour[1]);
$document->setValue('Phour2', $Phour[2]);
$document->setValue('Phour3', $Phour[3]);
$document->setValue('Phour4', $Phour[4]);
$document->setValue('Phour5', $Phour[5]);
$document->setValue('Phour6', $Phour[6]);
$document->setValue('Phour7', $Phour[7]);
$document->setValue('Phour8', $Phour[8]);
$document->setValue('Phour9', $Phour[9]);

$document->setValue('Pnameteacher1', $Pnameteacher[1]);
$document->setValue('Pnameteacher2', $Pnameteacher[2]);
$document->setValue('Pnameteacher3', $Pnameteacher[3]);
$document->setValue('Pnameteacher4', $Pnameteacher[4]);
$document->setValue('Pnameteacher5', $Pnameteacher[5]);
$document->setValue('Pnameteacher6', $Pnameteacher[6]);
$document->setValue('Pnameteacher7', $Pnameteacher[7]);
$document->setValue('Pnameteacher8', $Pnameteacher[8]);
$document->setValue('Pnameteacher9', $Pnameteacher[9]);

$document->setValue('Prating1', $Prating[1]);
$document->setValue('Prating2', $Prating[2]);
$document->setValue('Prating3', $Prating[3]);
$document->setValue('Prating4', $Prating[4]);
$document->setValue('Prating5', $Prating[5]);
$document->setValue('Prating6', $Prating[6]);
$document->setValue('Prating7', $Prating[7]);
$document->setValue('Prating8', $Prating[8]);
$document->setValue('Prating9', $Prating[9]);

$document->setValue('Pdate1', $Pdate[1]);
$document->setValue('Pdate2', $Pdate[2]);
$document->setValue('Pdate3', $Pdate[3]);
$document->setValue('Pdate4', $Pdate[4]);
$document->setValue('Pdate5', $Pdate[5]);
$document->setValue('Pdate6', $Pdate[6]);
$document->setValue('Pdate7', $Pdate[7]);
$document->setValue('Pdate8', $Pdate[8]);
$document->setValue('Pdate9', $Pdate[9]);





//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
/////Державна атестація////////////////////////////////////
/////////////////////////////////////////////////////////////

$num =1;
$qvery4 = $connect->query("SELECT `id_certification`, `name`, `rating`, `id_Students` FROM `certification` WHERE `id_Students`=$Students");
while ($row4 = $qvery4->fetch_assoc()) {
    $Dnum[$num] = $num;
    $Dname[$num] = $row4["name"];
    $Drating[$num] = $row4["rating"];
    $num++;
}
$document->setValue('Dnum1', $Dnum[1]);
$document->setValue('Dnum2', $Dnum[2]);
$document->setValue('Dnum3', $Dnum[3]);
$document->setValue('Dnum4', $Dnum[4]);
$document->setValue('Dnum5', $Dnum[5]);
$document->setValue('Dnum6', $Dnum[6]);

$document->setValue('Dname1', $Dname[1]);
$document->setValue('Dname2', $Dname[2]);
$document->setValue('Dname3', $Dname[3]);
$document->setValue('Dname4', $Dname[4]);
$document->setValue('Dname5', $Dname[5]);
$document->setValue('Dname6', $Dname[6]);

$document->setValue('Drating1', $Drating[1]);
$document->setValue('Drating2', $Drating[2]);
$document->setValue('Drating3', $Drating[3]);
$document->setValue('Drating4', $Drating[4]);
$document->setValue('Drating5', $Drating[5]);
$document->setValue('Drating6', $Drating[6]);








$document->saveAs($outputFile);
$dounloadfile = $outputFile;
header("Content-Type: application/octet-stream");
header("Accept-Ranges: bytes");
header("Content-Length: " . filesize($dounloadfile));
header('Content-Disposition: attachment; filename=' . $dounloadfile);
readfile($outputFile);
unlink($outputFile);
//$downloadfile = $outputFile;
//header("Content-Type: application/octet-stream");
//header('Content-Disposition: attachment; filename='.$downloadfile);
//readfile($downloadfile);

//$document->saveAs('review_full.docx');
//unlink($outputFile);
