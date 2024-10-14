<?php
        require_once "../../connect/connect.php";
        session_start();

        $id = $_GET['id'];
        $del_users = "DELETE FROM `advantages` WHERE `id_advantages` = $id";
        $result = $connect->query($del_users);

        if(isset($result)){
            $_SESSION['accept'] = 'Карточка успешно удалена';
            header('Location: edit_item_advantages.php');
        }
?>