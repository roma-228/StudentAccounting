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

//$email = trim($_POST['email']);
$email =  $_SESSION['userRestoration']['email'] ;
$password = $_POST['password'];
$passwordConfirmation = $_POST['passwordConfirmation'];

//-- Пошук однакових користувачей --
$qvery = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `email` = '$email' ");
$user = mysqli_fetch_assoc($qvery);
        $id_user = $user['id'];

if ($id_user > 0) {

    if ($password === $passwordConfirmation) {

        $password = md5($password);

        
        mysqli_query($connect, "UPDATE `users` SET `password`='$password' WHERE `id`='$id_user'");

        $_SESSION['message'] = 'Пароль успішно змінено';
        header('Location: ../index.php');
        unset($_SESSION['userRestoration']);
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../restorationPasword.php');
    }

} else {
    $_SESSION['message'] = 'Помилка, зверніться до адмінстратора';
    header('Location: ../restorationPasword.php');
}
?>
