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
    <title>Авторизация</title>
</head>
<body class="body_autorization">
    <div class="logo_autorization"><img src="../images/logo.png" alt="logo"></div>
    <div class="atorization_form">
        <form action="autorizationDB.php" method="POST">
            <div class="text_autorization">
                <h2>АВТОРИЗАЦИЯ</h2>
                <h4>ВВЕДИТЕ ДАННЫЕ ДЛЯ АВТОРИЗАЦИИ</h4>
            </div>
            <input type="text" name="phone" class="phone" placeholder="+79328165462" onblur="if(this.placeholder.length == 0) this.placeholder = '+79328165462'" onfocus="if(this.placeholder == '+79328165462') this.placeholder = ''" required>
            <input type="password" name="password" class="password"  placeholder="Введите пароль" onblur="if(this.placeholder.length == 0) this.placeholder = 'Введите пароль'" onfocus="if(this.placeholder == 'Введите пароль') this.placeholder = ''" required>
            <button type="submit" class="auto-btn" onclick="changeBackground()">Войти</button>
            <a href="../password_repeat/data_forms/repeat.php">Забыл пароль</a>
            <p>Еще нет аккаунта? <a href="../registration/registration.php">Зарегистрируйтесь</a></p>

           
            <p class="message">Неправильный логин или пароль</p>

        </form>
    </div>
    <script src="jquery/jquery-3.6.3.min.js"></script>
    <script src="background.js"></script>
    <script src="script.js"></script>
</body>
</html>