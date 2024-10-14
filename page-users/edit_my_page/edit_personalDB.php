<?php
    require_once "../../connect/connect.php";
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Редактирование</title>
</head>
<body class="edit_personalDB">
    <div class="add_block">
        <form action="editing.php" method="POST" class="form_add_person">
            <input type="text" name="name" placeholder="Введите имя" required>
            <input type="text" name="surname" placeholder="Введите фамлию" required>
            <input type="tl" name="phone" placeholder="+79271209527" required>
            <input type="email" name="email" placeholder="user@mail.ru" required>
            <input type="password" name="password" placeholder="Введите пароль" required>
            <input type="hidden" name="id" value="<?=$id?>">
            <button type="submit" class="btn-add-prsn">Изменить</button>
        </form>
    </div>
</body>
</html>