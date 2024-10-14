<?php
    require_once "../../connect/connect.php";
    session_start();

    $select_users = "SELECT * FROM `advantages` ";
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
            <form action="add_advantages.php" method="POST" class="form_add_person" enctype="multipart/form-data">
                <input type="file" name="file" required>
                <input type="text" name="description" placeholder="Введите описание" required>
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
                <p>Текст: <?=$data['description']?></p>
                <img src="<?=$data['photo']?>" alt="">
                <a href="edit_item_advantagesDB.php?id=<?=$data['id_advantages']?>">Редактировать</a>
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
                <p>Текст: <?=$data['description']?></p>
                <img src="<?=$data['photo']?>" alt="">
                <a href="delDB.php?id=<?=$data['id_advantages']?>">Удалить</a>
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