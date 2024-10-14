<?php
    require_once "../../connect/connect.php";
    session_start();

    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])){
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $id = $_POST['id'];
        if(isset($_SESSION['user'])){
            $select_users = "SELECT * FROM `Users` WHERE `Phone` = '$phone' AND `Password` = '$password' AND `Name` = '$name' AND `Surname` = '$surname' and `Email` = '$email'";
            $result_select = $connect->query($select_users);

            if(mysqli_num_rows($result_select) > 0){
                $_SESSION['update'] = 'Данные идентичны';
                header('Location: edit_my_page.php');
                
            }
            else{
                $insert_users = "UPDATE `Users` SET `Surname`='$surname',`Name`='$name', `Email`='$email', `Phone`='$phone',`Password`='$password' WHERE `id_users` = $id";
            
                $result_inser = $connect->query($insert_users);
                $_SESSION['update'] = 'Ваши данные успешно обновлены';
                header('Location: edit_my_page.php');
            }
        }else{
            $select_users = "SELECT * FROM `Staff` WHERE `Phone` = '$phone' AND `Password` = '$password' AND `Name` = '$name' AND `Surname` = '$surname' and `Email` = '$email'";
            $result_select = $connect->query($select_users);

            if(mysqli_num_rows($result_select) > 0){
                $_SESSION['update'] = 'Данные идентичны';
                header('Location: edit_my_page.php');
                
            }
            else{
                $insert_users = "UPDATE `Staff` SET `Surname`='$surname',`Name`='$name', `Email`='$email', `Phone`='$phone',`Password`='$password' WHERE `id_staff` = $id";
            
                $result_inser = $connect->query($insert_users);
                $_SESSION['update'] = 'Ваши данные успешно обновлены';
                header('Location: edit_my_page.php');
            }
        }

    }

?>