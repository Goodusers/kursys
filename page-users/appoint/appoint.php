<?php
    require_once "../../connect/connect.php";
    session_start();

    $select_users = "SELECT * FROM `Staff` INNER JOIN `StatusOrder` ON Staff.id_status = StatusOrder.Id";
    $result_select = $connect->query($select_users);
    $id_item = $_GET['id_item'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Направление</title>
</head>
<body class="edit_person">
    <div class="block_person">

        <?php while($data = mysqli_fetch_assoc($result_select)){?>
            <?php if($data['Title'] == "Свободен" || $data['Title'] == "Доставлено"){?>
            <div class="edit_block">
                <p>Имя: <?=$data['Name']?></p>
                <p>Фамилия: <?=$data['Surname']?></p>
                <p>Номер телефона: <?=$data['Phone']?></p>
                <p>Почта: <?=$data['Email']?></p>
                <a href="appointDB.php?id=<?=$data['id_staff']?>&id_item=<?=$id_item?>">Выбрать</a>
                <?php if($_SESSION['update']){?>
                    <p class="update">
                        <?php echo $_SESSION['update'];?>z
                    </p>
                <?php unset($_SESSION['update']); } ?>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>