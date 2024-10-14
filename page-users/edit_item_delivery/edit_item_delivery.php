<?php
    require_once "../../connect/connect.php";
    session_start();

    $select_users = "SELECT * FROM `catalog` INNER JOIN `type_cargo` ON catalog.type = type_cargo.id_cargo";
    $result_select = $connect->query($select_users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Редактор доставок</title>
</head>
<body class="edit_person">
    <div class="block_person">
        <div class="add_block">
            <form action="add_personalDB.php" method="POST" class="form_add_person" enctype="multipart/form-data">
                <input type="file" name="file" required>
                <input type="text" name="name" placeholder="Введите наименование" required>
                <input type="text" name="cost" placeholder="Введите стоимость" required>
                <input type="text" name="categories" placeholder="Введите характеристики" required>
                <select name="type" >
                    <option value="1">Еда</option>
                    <option value="2">Техника</option>
                    <option value="3">Промышленный товар</option>
                    <option value="4">Другое</option>
                </select>
                <button type="submit" class="btn-add-prsn">Добавить</button>
                <?php if($_SESSION['accept']){?>
                    <p class="accept">
                        <?php echo $_SESSION['accept'];?>
                    </p>
                <?php unset($_SESSION['accept']); } ?>
                <?php if($_SESSION['message']){?>
                    <p class="message">
                        <?php echo $_SESSION['message'];?>
                    </p>
                <?php unset($_SESSION['message']); } ?>
            </form>
        </div>
        <?php while($data = mysqli_fetch_assoc($result_select)){?>
            <div class="edit_block">
                <p>Наименование: <?=$data['name']?></p>
                <p>Стоимость: <?=$data['cost']?></p>
                <p>Характеристики: <?=$data['categories']?></p>
                <p>Тип: <?=$data['title']?></p>
                <a href="edit_item_deliveryDB.php?id=<?=$data['id_catalog']?>">Редактировать</a>
                <?php if($_SESSION['update']){?>
                    <p class="update">
                        <?php echo $_SESSION['update'];?>
                    </p>
                <?php unset($_SESSION['update']); } ?>
                <?php if($_SESSION['message']){?>
                    <p class="message">
                        <?php echo $_SESSION['message'];?>
                    </p>
                <?php unset($_SESSION['message']); } ?>
            </div>
        
            <div class="del_block">
                <p>Наименование: <?=$data['name']?></p>
                <p>Стоимость: <?=$data['cost']?></p>
                <p>Характеристики: <?=$data['categories']?></p>
                <p>Тип: <?=$data['title']?></p>
                <a href="delDB.php?id=<?=$data['id_catalog']?>">Удалить</a>
                <?php if($_SESSION['accept']){?>
                    <p class="accept">
                        <?php echo $_SESSION['accept'];?>
                    </p>
                <?php unset($_SESSION['accept']); } ?>
            </div>  
        <?php } ?>
    </div>
</body>
</html>