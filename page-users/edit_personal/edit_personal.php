<?php
    require_once "../../connect/connect.php";
    session_start();

    $select_users = "SELECT * FROM `Staff`";
    $result_select = $connect->query($select_users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Редактор персонала</title>
</head>
<body class="edit_person">
    <div class="block_person">
        <div class="add_block">
            <form action="add_personalDB.php" method="POST" class="form_add_person">
                <input type="text" name="name" placeholder="Введите имя" required>
                <input type="text" name="surname" placeholder="Введите фамлию" required>
                <input type="text" name="patronymic" placeholder="Введите отчество">
                <input type="tl" name="phone" placeholder="+79271209527" required>
                <input type="email" name="email" placeholder="user@mail.ru" required>
                <input type="password" name="password" placeholder="Введите пароль" required>
                <button type="submit" class="btn-add-prsn">Добавить</button>
                <?php if($_SESSION['accept']){?>
                    <p class="accept">
                        <?php echo $_SESSION['accept'];?>
                    </p>
                <?php unset($_SESSION['accept']); } ?>
            </form>
        </div>
        <?php while($data = mysqli_fetch_assoc($result_select)){?>
            <div class="edit_block">
                <p>Имя: <?=$data['Name']?></p>
                <p>Фамилия: <?=$data['Surname']?></p>
                <p>Отчество: <?=$data['Patronymic']?></p>
                <p>Номер телефона: <?=$data['Phone']?></p>
                <p>Почта: <?=$data['Email']?></p>
                <a href="edit_personalDB.php?id=<?=$data['id_staff']?>">Редактировать</a>
                <?php if($_SESSION['update']){?>
                    <p class="update">
                        <?php echo $_SESSION['update'];?>
                    </p>
                <?php unset($_SESSION['update']); } ?>
            </div>
        
            <div class="del_block">
                <p>Имя: <?=$data['Name']?></p>
                <p>Фамилия: <?=$data['Surname']?></p>
                <p>Отчество: <?=$data['Patronymic']?></p>
                <p>Номер телефона: <?=$data['Phone']?></p>
                <p>Почта: <?=$data['Email']?></p>
                <a href="delDB.php?id=<?=$data['id_staff']?>">Удалить</a>
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