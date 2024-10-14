<?php
        require_once "../../connect/connect.php";
        session_start();

        $id = $_GET['id'];
        if(isset($_SESSION['user'])){
            $del_users = "DELETE FROM `Users` WHERE `id_users` = $id";
            $result = $connect->query($del_users);
        }else{
            $del_users = "DELETE FROM `Staff` WHERE `id_staff` = $id";
            $result = $connect->query($del_users);
        }
        if(isset($result)){
            session_destroy();
            header('Location: /');
        }
?>