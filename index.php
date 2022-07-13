<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизація </title>
    <link rel="stylesheet" href="assets/css/main.css">
    
</head>
<body >
<Main id="swup" class="transition-fade">
<!-- Форма авторизации -->
    <form action="/vendor/signin.php" method="post">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть свій логін">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <button  type="submit">Увійти</button>
        <p>
            <a href="/restoration.php">Забули логін або пароль?</a>
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</Main>
<script src="/script/swup/swup.min.js"></script>
    <script>
        const swup = new Swup();
    </script>
</body>
</html>