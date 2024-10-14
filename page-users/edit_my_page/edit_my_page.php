<?php
    session_start();

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
        <div class="edit_block">
            <?php if(isset($_SESSION['user'])){?>
                <p>Имя: <?=$_SESSION['user']['Name']?></p>
                <p>Фамилия: <?=$_SESSION['user']['Surname']?></p>
                <p>Номер телефона: <?=$_SESSION['user']['Phone']?></p>
                <p>Почта: <?=$_SESSION['user']['Email']?></p>
                <a href="edit_personalDB.php?id=<?=$_SESSION['user']['id_users']?>">Редактировать</a>
                <a href="delDB.php?id=<?=$_SESSION['user']['id_users']?>">Удалить</a>
                <?php if($_SESSION['update']){?>
                    <p class="update">
                        <?php echo $_SESSION['update'];?>
                    </p>
                <?php unset($_SESSION['update']); } ?>
            <?php }else{ ?>
                <p>Имя: <?=$_SESSION['user_staff']['Name']?></p>
                <p>Фамилия: <?=$_SESSION['user_staff']['Surname']?></p>
                <p>Номер телефона: <?=$_SESSION['user_staff']['Phone']?></p>
                <p>Почта: <?=$_SESSION['user_staff']['Email']?></p>
                <a href="edit_personalDB.php?id=<?=$_SESSION['user_staff']['id_staff']?>">Редактировать</a>
                <a href="delDB.php?id=<?=$_SESSION['user_staff']['id_staff']?>">Удалить</a>
                <?php if($_SESSION['update']){?>
                    <p class="update">
                        <?php echo $_SESSION['update'];?>
                    </p>
                <?php unset($_SESSION['update']); } ?>
            <?php } ?>
        </div>
    </div>
</body>
</html>