<?php
    require_once "header/header.php";
    require_once "connect/connect.php";

    $select_advantages = "SELECT * FROM `advantages`";
    $result_advantages = $connect->query($select_advantages);

    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Fast delivery</title>
</head>
<body>
    <content>
        <div class="info_block">
            <span class="delivery_ufa">ПЕШАЯ ДОСТАВКА </span><span id="ufa">в Уфе от 500 руб.</span> 
            <div class="button_info_block">
                <a href="choose/choose.php">Оформить заявку</a>
            </div>
        </div>
        <div class="wrapper">
            <?php while($data = mysqli_fetch_assoc($result_advantages)){ ?>
                <div class="block_item">
                    <div class="img_item"><img src="<?=$data['photo']?>" alt="sav5"></div>
                    <div class="text_item"><span><?=$data['description']?></span></div>
                </div>
            <?php } ?>
        </div>
        <div class="cooperation">
            <div class="coop_text"><h2>С НАМИ СОТРУДНИЧАЮТ</h2></div>
            <div class="wrap_coop">
                <div class="coop_img">
                    <img src="images/free.png" alt="apteka">
                    <img src="images/icons8-burger-king-480.png" alt="">
                    <img src="images/yandex.png" alt="">
                </div>
            </div>
        </div>
        <div class="coop_text"><h2>ВИДЫ ДОСТАВОК</h2></div>
        <div class="type">
            <div class="one_type">
                <h2>ГРУЗОВАЯ</h2>
                <ul>
                    <li>финансовая доступность;</li>
                    <li>прямая зависимость стоимости доставки от занимаемого грузом пространства;</li>
                    <li>регулярность и точность осуществления отправок;</li>
                    <li>надежность (груз защищен от воздействия внешней среды, ударов и повреждений) и универсальность (можно перевозить любые грузы)</li>
                </ul>
                <div class="button_block">
                    <a href="choose/choose.php">Оформить заявку</a>
                </div>
            </div>
            <div class="two_type">
            <h2>ПЕШАЯ</h2>
                <ul>
                    <li>финансовая доступность;</li>
                    <li>скорость и безопасность – высокие;</li>
                    <li>регулярность и точность осуществления отправок;</li>
                    <li>подход к клиенту – индивидуальный;</li>
                    <li>стоимость - средняя</li>
                </ul>
                <div class="button_block">
                    <a href="choose/choose.php">Оформить заявку</a>
                </div>
            </div>
        </div>
    </content>
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