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

        $select_users = "SELECT * FROM `Staff` WHERE `Phone` = '$phone' AND `Password` = '$password'";
        $result_select = $connect->query($select_users);

        if(mysqli_num_rows($result_select) > 0){
            $_SESSION['accept'] = 'Такой пользователь уже существует';
            header('Location: edit_personal.php');
        }
        else{
            $insert_users = "INSERT INTO `Staff`(`id_staff`, `Name`, `Surname`, `Patronymic`, `Phone`, `Email`, `Password`, `id_status`) VALUES (NULL, '$name','$surname','$patronymic','$phone','$email','$password', 7)";
            $result_inser = $connect->query($insert_users);
            $_SESSION['accept'] = 'Курьер успешно добавлен';
            header('Location: edit_personal.php');
        }
    }

?>