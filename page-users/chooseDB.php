<?php
    require_once "../connect/connect.php";  

    session_start();
    if(isset($_POST)){

        $user = $_SESSION['user']['id_users'];
        $id = $_POST['id'];

        $goods = $_POST['goods'];
        $addressDeliv = $_POST['addressDeliv'];
        $addressSend = $_POST['addressSend'];

        $dateDeliv =  date('Y-m-d H:i:s', strtotime($_POST['dateDeliv'] . ":00"));
        $dateSend = date('Y-m-d H:i:s', strtotime($_POST['dateSend'] . ":00"));

        date_default_timezone_set('Asia/Yekaterinburg');

        $date = date('Y-m-d H:i:s');

        $insert_data = "INSERT INTO `Application`(`Code_application`, `Klient`, `Status`, `id_catalog`, `goods`, `Comment`, `addressDeliv`, `addressSend`, `dateDeliv`, `dateSend`, `Recording_date`) VALUES (NULL,'$user', 1, '$id','$goods', NULL, '$addressDeliv', '$addressSend', '$dateDeliv', '$dateSend', '$date')";
        $result_insert = $connect->query($insert_data);
        header('Location: ../page-users/userpage.php');
    }
    else{
        header('Location: ../choose/choose.php');
    }

?>