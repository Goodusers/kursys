<?php
        require_once "../../connect/connect.php";
        session_start();

        $id = $_GET['id'];
        $del_users = "DELETE FROM `Staff` WHERE `id_staff` = $id";
        $result = $connect->query($del_users);

        if(isset($result)){
            $_SESSION['accept'] = 'Курьер успешно удален';
            header('Location: edit_personal.php');
        }
?>