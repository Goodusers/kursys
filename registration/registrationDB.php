<?php
    require_once "../connect/connect.php";
    session_start();

    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['password-repeat']) && isset($_POST['email'])){
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $patronymic = htmlspecialchars($_POST['patronymic']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $organization = htmlspecialchars($_POST['organization']);
        $password = htmlspecialchars($_POST['password']);
        $password_repeat = htmlspecialchars($_POST['password-repeat']);

        $query_users = $connect->query("SELECT * FROM `Users` WHERE `Phone` = '$phone' ");  

        if(mysqli_fetch_row($query_users) > 0){
            
            $_SESSION['message'] = 'Увы, этот номер уже занят!';
            header('Location: registration.php');
        }    
        else{
            $insert_users = "INSERT INTO `Users` VALUES(NULL, '$surname', '$name','$patronymic', '$email', '$phone', '$password', 2, '$organization') ";
        }
        if($password == $password_repeat){
            
            $result_insert = $connect->query($insert_users);
            header('Location: ../autorization/autorization.php');
        }
        else{
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: registration.php');
        }
    } 
?>