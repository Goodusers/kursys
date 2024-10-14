<?php
    require_once "../../connect/connect.php";
    session_start();
    $id = $_POST['id_advantages'];
    if(isset($_POST)){

        $description = htmlspecialchars($_POST['description']);
        $type = $_POST['type'];
        $file = "../../images/".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $file);

     
        $select_users = "SELECT * FROM `advantages` WHERE `description` = '$description' AND `photo` = '$file'";
        $result_select = $connect->query($select_users);

        if(mysqli_num_rows($result_select) > 0){
            $_SESSION['message'] = 'Данные идентичны';
            header('Location: edit_item_advantages.php');
        }
        else{
            $insert_users = "UPDATE `advantages` SET `photo`='$file',`description`=' $description' WHERE `id_advantages` = $id";
            $result_inser = $connect->query($insert_users);
            $_SESSION['accept'] = 'Карточка успешно обновлена';
            header('Location:  edit_item_advantages.php');          
        }
    }

?>