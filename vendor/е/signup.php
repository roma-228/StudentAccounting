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

$full_name = trim($_POST['full_name']);
$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$checkbox = $_POST['checkbox'];

//-- Пошук однакових користувачей --
$qvery = mysqli_query($connect, "SELECT * FROM `users` WHERE `full_name` ='$full_name' or `login` = '$login' or `email` = '$email' ");

if (mysqli_num_rows($qvery) === 0) {

    if ($password === $password_confirm) {
        if($checkbox == "on"){
            $checkbox = 1;
        }
        else{
            $checkbox = 0;
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `SuperAdmin`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$checkbox')");

        $_SESSION['message'] = 'Користувача ' . $full_name . ' успішно зареєстровано !';
        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

} else {
    $_SESSION['message'] = 'Користувач з таким ПІБ, логіном або поштою вже існує';
    header('Location: ../register.php');
}
?>
