<?php
    require_once "../connect/connect.php";
    session_start();

    $user = $_SESSION['user']['id_users'];
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['message'])){
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']); 

        $insert_users = "INSERT INTO `help` VALUES(NULL, '$name', '$surname', '$email', '$message', $user) ";
        $result_insert = $connect->query($insert_users);

        if($result_insert){
            
            $_SESSION['accept'] = 'Сообщение успешно отпавлено!';
            header('Location: contacts.php');
        }    
        else{
            $_SESSION['message'] = 'Ошибка отправки!';
            header('Location: contacts.php');
        }
    } 
?>