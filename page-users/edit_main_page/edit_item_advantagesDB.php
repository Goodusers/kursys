<?php
    require_once "../../connect/connect.php";
    session_start();
    $id = $_GET['id']
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
        <form action="editing.php" method="POST" class="form_add_person" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <input type="text" name="description" placeholder="Введите характеристики" required>

            <input type="hidden" name="id_advantages" value="<?= $id?>">
            <button type="submit" class="btn-add-prsn">Изменить</button>
        </form>
    </div>
</body>
</html>