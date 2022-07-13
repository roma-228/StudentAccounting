<?php

    session_start();
    $connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
    $connect->query('SET NAMES "utf8"');
    if (!$connect) {
        die('Error connect to DataBase');
    }
    if (!$connect->set_charset($charset)) {
        echo "Ошибка установки кодировки utf8";
    }

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "email" => $user['email'],
            "login" => $user['login'],
            "SuperAdmin" => $user['SuperAdmin']
        ];
        if($user['SuperAdmin'] != 0){
            header('Location: ../profileAdmin.php');
        }
        elseif($user['SuperAdmin']==0)
        {
            header('Location: ../profile.php');
        }
        

    } else {
        $_SESSION['message'] = 'Не правильний логін або пароль';
        header('Location: ../index.php');
    }
    ?>


