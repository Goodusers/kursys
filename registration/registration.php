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
    <title>Регистрация</title>
</head>
<body class="body_registration">
    <div class="logo_autorization"><img src="../images/logo.png" alt="logo"></div>
    <div class="atorization_form">
        <form action="registrationDB.php" method="POST">
            <div class="text_autorization">
                <h2>РЕГИСТРАЦИЯ</h2>
                <h4>ВВЕДИТЕ ДАННЫЕ ДЛЯ РЕГИСТРАЦИИ</h4>
            </div>
            <input type="text" name="name" placeholder="Введите имя" required>
            <input type="text" name="surname" placeholder="Введите фамилию" required>
            <input type="text" name="patronymic" placeholder="Введите отчество">
            <input type="text" name="phone" placeholder="+79305184022" required>
            <input type="email" name="email" placeholder="user@mail.ru" required>
            <input type="text" name="organization" placeholder="Введите организацию">
            <input type="password" name="password" placeholder="Введите пароль" required>
            <input type="password" name="password-repeat" placeholder="Повторите пароль" required>
            <button type="submit" class="auto-btn">Завершить</button>
            <?php if(isset($_SESSION['message'])){?>
                <p class="message">
                    <?php echo $_SESSION['message'];?>
                </p>
            <?php unset($_SESSION['message']);} ?>
            <p>Уже есть аккаунт? <a href="../autorization/autorization.php">Войти</a></p>
        </form>
    </div>
</body>
</html>