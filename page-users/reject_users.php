<?php
    session_start();
    require_once "../connect/connect.php";

    $id_reject = $_GET['del'];

        $query_reject = "DELETE FROM `Application` WHERE `Code_application` = '$id_reject' AND Klient = '".$_SESSION['user']['id_users']."'";
        $result_query = $connect->query($query_reject);

        header('Location: userpage.php');

?>
