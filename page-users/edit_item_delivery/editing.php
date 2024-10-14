<?php
    require_once "../../connect/connect.php";
    session_start();
    $id = $_GET['id'];

    if(isset($_POST)){

        $name = htmlspecialchars($_POST['name']);
        $categories = htmlspecialchars($_POST['categories']);
        $cost = htmlspecialchars($_POST['cost']);
        $type = $_POST['type'];
        $file = "../../images/".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $file);

     
        $select_users = "SELECT * FROM `catalog` WHERE `name` = '$name' AND `categories` = '$categories' AND `cost` = $cost AND `type` = $type AND `photo` = '$file'";
        $result_select = $connect->query($select_users);

        if(mysqli_num_rows($result_select) > 0){
            $_SESSION['message'] = 'Данные идентичны';
            header('Location: edit_item_delivery.php');
        }
        else{
            $insert_users = "UPDATE `catalog` SET `photo`='$file',`name`=' $name',`cost`='$cost',`categories`='$categories',`type`='$type' WHERE id_catalog = $id";
            $result_inser = $connect->query($insert_users);
            $_SESSION['accept'] = 'Карточка успешно обновлена';
            header('Location:  edit_item_delivery.php');
        }
    }

?>