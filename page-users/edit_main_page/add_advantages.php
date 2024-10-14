<?php
    require_once "../../connect/connect.php";
    session_start();

    if(isset($_POST)){
        $description = htmlspecialchars($_POST['description']);
        $file = "../../images/".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $file);

     
        $select_users = "SELECT * FROM `advantages` WHERE `description` = '$description' AND `photo` = '$file'";
        $result_select = $connect->query($select_users);

        if(mysqli_num_rows($result_select) > 0){
            $_SESSION['message'] = 'Такая карточка уже существует';
            header('Location: edit_item_advantages.php');
        }
        else{
            $insert_users = "INSERT INTO `advantages`(`id_advantages`, `description`, `photo`) VALUES (NULL,'$description','$file')";
            $result_inser = $connect->query($insert_users);
            $_SESSION['accept'] = 'Карточка успешно добавлена';
            header('Location:  edit_item_advantages.php');
        }
    }

?>