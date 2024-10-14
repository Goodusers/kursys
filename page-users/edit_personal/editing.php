<?php
    require_once "../../connect/connect.php";
    session_start();

    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])){
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $patronymic = htmlspecialchars($_POST['patronymic']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $id = $_POST['id'];

        $select_users = "SELECT * FROM `Staff` WHERE `Phone` = '$phone' AND `Password` = '$password' AND `Name` = '$name' AND `Surname` = '$surname' and `Email` = '$email'";
        $result_select = $connect->query($select_users);

        if(mysqli_num_rows($result_select) > 0){
            $_SESSION['update'] = 'Данные идентичны';
            header('Location: edit_personal.php');
            
        }
        else{
            $insert_users = "UPDATE `Staff` SET `Surname`='$surname',`Name`='$name', `Patronymic`='$patronymic',  `Email`='$email', `Phone`='$phone',`Password`='$password' WHERE `id_staff` = $id";
           
            $result_inser = $connect->query($insert_users);
            $_SESSION['update'] = 'Курьер успешно обновлен';
            header('Location: edit_personal.php');
        }
    }

?>