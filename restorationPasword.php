<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}
elseif($_GET['value'] != 228755)
{
    $_SESSION['message'] = 'Помилка';
    header('Location: restoration.php');
    
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Відновлення паролю</title>
    <link rel="stylesheet" href="assets/css/main.css">
   
</head>
<body>
<Main id="swup" class="transition-fade">
<div class="Back" data-tooltip="Попередня сторінка"><a href="/Диплом_Рома/restoration.php"><img class="BackImg" src="https://cdn-icons-png.flaticon.com/512/2223/2223615.png" ></a></div>

<!-- Форма зміни паролю -->
    <form action="vendor/restorationPasswordForm.php" method="post">
    <p class="RestorationText"> Зміна пароля</p>
        <label>Новий пароль</label>
        <input type="password" name="password" placeholder="Введіть новий пароль">
        <label>Підтвердження паролю</label>
        <input type="password" name="passwordConfirmation" placeholder="Підтвердіть новий пароль">
        <button  type="submit">Змінити</button>
        
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</Main>
</body>
</html>