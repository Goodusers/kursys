<?php
    $nums = rand(1000,5000);

    session_start();
    $phone = $_SESSION['phone'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Смена пароля</title>
</head>
<body class="body_autorization">
    <div class="logo_autorization"><img src="../../images/logo.png" alt="logo"></div>
    <div class="atorization_form">
        <form action="#" method="POST" id="rep_pass">
            <div class="text_autorization">
                <h2>СМЕНА ПАРОЛЯ</h2>
                <h4>ВВЕДИТЕ ДАННЫЕ ДЛЯ СМЕНЫ ПАРОЛЯ</h4>
            </div>
            <input type="text" name="phone" class="phone" placeholder="+79328165462" onblur="if(this.placeholder.length == 0) this.placeholder = '+79328165462'" onfocus="if(this.placeholder == '+79328165462') this.placeholder = ''" required>
            <input type="hidden" name="nums" value="<?=$nums?>">
            <button type="submit" class="auto-btn" onclick="changeBackground()"> Подтвердить</button>
        </form>
        
        <form action="update_data.php" method="POST" id="mail_key">
            <input type="tn" name="key" class="key" placeholder="0000" required>
            <input type="password" name="password" class="password" placeholder="Введите пароль" required>
            <input type="password" name="password_repeat" class="password_r" placeholder="Повторите пароль" required>
            <input type="hidden" name="email_key" value="<?=$nums?>">
            <input type="hidden" name="email_phone" value="<?=$phone?>">
            <button type="submit" class="auto-btn" onclick="repeat()"> Подтвердить</button>
        </form>
    </div>
    <script src="script.js"></script>
    <script src="jquery/jquery-3.6.3.min.js"></script>
    <script src="background.js"></script>
</body>
</html>