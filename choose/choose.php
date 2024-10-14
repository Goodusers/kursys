<?php
    require_once "../header/header.php";
    require_once "../connect/connect.php";

    $select_catalog = "SELECT * FROM `catalog` INNER JOIN `type_cargo` ON catalog.type = type_cargo.id_cargo ";
    $result_select = $connect->query($select_catalog);

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Выбрать доставку</title>
</head>
<body class="body_choose">
    <div class="catalog">
        <?php while($data = mysqli_fetch_assoc($result_select)){?>
            <div class="block_cards">
                <div class="title"><p><?=$data['name']?></p></div>
                <div class="img_catalog"><img src="<?=$data['photo']?>" alt="gruz"></div>
                <div class="price"><p>От <?=$data['cost']?>₽</p></div>
                <div class="categories"> <p><?=$data['categories']?></p></div>
                <div class="type_categor"><p>Категория: <?=$data['title']?></p></div>

                <form action="../page-users/chooseDB.php" method="POST">
                    <p>Введите вид грузка!</p>
                    <input type="text" name="goods" placeholder="Хрупкий, опасный, ценный, тяжелый" required>

                    <p>Введите адрес доставки!</p>
                    <input type="text" name="addressDeliv" placeholder="г.Уфа, ул.Кирова 12" required>

                    <p>Введите адрес отправки!</p>
                    <input type="text" name="addressSend" placeholder="г.Уфа, ул.Карла Маркса 18" required>

                    <p>Введите дату и время отправки</p>
                    <input type="datetime-local" name="dateSend" placeholder="г.Уфа, ул.Карла Маркса 18" required>

                    <p>Введите дату и время прибытия</p>
                    <input type="datetime-local" name="dateDelive" placeholder="г.Уфа, ул.Карла Маркса 18" required>

                    <input type="hidden" name="id" value="<?=$data['id_catalog']?>">
                    <div class="button_catalog"> <button type="submit">ВЫБРАТЬ</button> </div>
                </form>
            </div>
        <?php } ?>
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