<?php
    require_once "../../header/header.php";
    require_once "../../connect/connect.php";
       
    session_start();

    $user = $_SESSION['user']['id_users'];

    $id = $_GET['id'];

    $query_info = "SELECT * FROM `baske` INNER JOIN `catalog` ON catalog.id = baske.id INNER JOIN `Users` ON Users.id_users = baske.id_users WHERE catalog.id = '$id' AND Users.id_users = '$user'";
    $result_query_info = $connect->query($query_info);
    $data = mysqli_fetch_assoc($result_query_info);

    $id_basket = $data['id_basket'];
    
    $del_quantity = $_GET['del_quantity'];

    $cost = $data['cost'];
    $price = $_GET['price'];

    if(isset($del_quantity)){
        $del_quantity -= 1;
        $price = $price - $cost;
        $update_baske = "UPDATE `baske` SET `quantity`=' $del_quantity', `price` = $price WHERE `id_basket` = $id_basket AND `id` = $id AND `id_users` = $user";
        $result_update = $connect->query($update_baske);
        header('Location: basket.php');
    }
?>