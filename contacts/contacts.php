<?php
    require_once "../header/header.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Контакты</title>
</head>
<body>
    <div class="contacts">
        <div class="text_contacts"><p>МЫ ЕСТЬ В</p></div>
        <div class="block_icons">
            <div class="social_block">
                <div class="img_social"> <a href="https://vk.com"><img src="../images/vkontakte.png" alt="VK"></a> </div>
                <div class="text_social">VK</div>
            </div>
            <div class="social_block">
                <div class="img_social"> <a href="https://ok.ru"><img src="../images/odnoklassniki.png" alt="OK"></a> </div>
                <div class="text_social">OK</div>
            </div>
            <div class="social_block">
                <div class="img_social"> <a href="https://web.telegram.org"><img src="../images/telegram.png" alt="telegram"></a> </div>
                <div class="text_social">TM</div>
            </div>
            <div class="social_block">
                <div class="img_social"> <a href="https://whatsapp.com"><img src="../images/whatsapp.png" alt="whatsapp"></a> </div>
                <div class="text_social">WP</div>
            </div>
            <div class="social_block">
                <div class="img_social"> <a href="https://youtube.com"><img src="../images/youtube.png" alt="youtube"></a> </div>
                <div class="text_social">YT</div>
            </div>
        </div>
        <div class="map"><img src="../images/map.jpg" alt="map"></div>
        <div class="text_contacts"><p>НАПИСАТЬ В ПОДДЕРЖКУ</p></div>
        <form action="contactsDB.php" method="POST" class="form_help">
            <input type="text" name="name" placeholder="Введите имя" required>
            <input type="text" name="surname" placeholder="Введите фамилию" required>
            <input type="email" name="email" placeholder="Введите email" required>
            <textarea name="message" placeholder="Введите Ваше сообщение" required></textarea>
            <?php if(isset($_SESSION['user'])){?><div class="button_help">  <button type="submit">Отправить</button></div><?php }else{ ?>
            <div class="button_help">  <a href="../autorization/autorization.php">Войдите</a></div>
            <?php }?>

            <?php if($_SESSION['message']){?>
            <p class="message">
                <?php echo $_SESSION['message'];?>
            </p>
            <?php unset($_SESSION['message']); }?>

            <?php if($_SESSION['accept']){?>
            <p class="accept">
                <?php echo $_SESSION['accept'];?>
            </p>
            <?php unset($_SESSION['accept']); }?>

        </form>
    </div>
    <footer>
        <div class="wrap_footer">
            <div class="number_header">
                <p>КОНТАКТЫ:</p>
                <p>+79801963031</p>
                <p>+79802123208</p>
            </div>
            <div class="email">
                <p>EMAIL:</p>
                <p>FastDelivery2023@mail.ru</p>
            </div>
        </div>
        <p>&copy;</p>
        <p>2023г.</p>
    </footer>
</body>
</html>