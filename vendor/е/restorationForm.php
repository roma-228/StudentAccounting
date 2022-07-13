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

$email = trim($_POST['email']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['userRestoration'] = [
        
        "email" => $email
    ];
    $user = mysqli_fetch_assoc($check_user);
    
    //Відправка посилання на пошту
    $subject = "Відновлення паролю";
    $to = $email; 
    $from = "a.rovna@mksumdu.info";
    $massage = '<html><body><center> 
    <h1 style="font-weight: bold;font-size: 25px; color: black;">Відновлення облікового запису</h1></center>
    <p style=" font-size: 15px;text-indent: 15px; line-height:1.5; margin-bottom: 50px;color: black;"> Доброго здоров’я '.$user['full_name'].'!<br><br>З вашого акаунту <b>«'.$user['login'].'»</b> було запрошено <b>відновлення паролю</b>.<br>  Для відновлення доступу до вашого облікового запису <b>"Облік студентів фахового Машинобудівного коледжу СумДУ"</b>, потрібно натиснути на зелену кнопку <b>"Відновлення паролю"</b></p>
<center><a style="background-color: green; width: 200px;height:200px; font-size: 20px; color: aliceblue; border-radius: 15px; text-decoration: none;padding: 15px; " href = "http://localhost/%D0%94%D0%B8%D0%BF%D0%BB%D0%BE%D0%BC_%D0%A0%D0%BE%D0%BC%D0%B0/restorationPasword.php?value=228755">Відновлення паролю</a></center>
<p style="font-size: 15px;text-indent: 15px;margin-top: 50px;line-height:1.5;color: black;">З повагою адміністратор Машинобудівного коледжу</p>  <p style="color: black;font-size: 15px;text-indent: 15px;">From: <"roma.davydovv@gmail.com"> </p></body></html>';

    $headers = "From: $from" . "\r\n" .
        "Reply-To: $from" . "\r\n" .
        "Content-type: text/html; charset=iso-8859-1". "\r\n" .
        "X-Mailer: PHP/" . phpversion();       

    if (mail($to, $subject,$massage, $headers)) {
        $_SESSION['message'] = 'Лист був надісланний на пошту ' . $email;
    } else {
        $_SESSION['message'] = 'Помилка відправки, зверніться до адміністратора ';
    }
    header('Location: ../restoration.php');
} elseif ($email == "") {
    $_SESSION['message'] = 'Поле "Пошта" не заповненно';
    header('Location: ../restoration.php');
} else {
    $_SESSION['message'] = 'Користувача з поштою ' . $email . ' не існує';
    header('Location: ../restoration.php');
}
