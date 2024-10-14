<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Fast delivery</title>
</head>
<body>
    <header>
        <div class="logo"><img src="../images/logo.png" alt="logo"></div>
        <nav>
            <?php if(!isset($_SESSION['user'])  && !isset($_SESSION['user_staff'])){?>
                <a href="/">На главную</a>
                <a href="../choose/choose.php">Выбрать доставку</a>
                <a href="../contacts/contacts.php">Контакты</a>
                <a href="../autorization/autorization.php">Войти</a>
                <a href="../registration/registration.php">Зарегистрироваться</a>
            <?php } ?>

            <?php if(isset($_SESSION['user']) || isset($_SESSION['user_staff'])){?>
                <a href="/">На главную</a>
                <a href="../choose/choose.php">Выбрать доставку</a>
                <a href="../contacts/contacts.php">Контакты</a>
                <a href="../page-users/userpage.php">Моя страница</a>
                <a href="../page-users/logout.php">Выйти</a>
            <?php } ?>
        </nav>
    </header>
</body>
</html>