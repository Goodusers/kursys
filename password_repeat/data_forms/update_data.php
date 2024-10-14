<?php
    require_once "../../connect/connect.php";

    if(isset($_POST)){
        $key = htmlspecialchars($_POST['key']);
        $password = htmlspecialchars($_POST['password']);
        $password_repeat = htmlspecialchars($_POST['password_repeat']);

        $email_key = $_POST['email_key'];
        $phone = $_SESSION['phone'];

        $update = "UPDATE `Users` SET `Password`='$password' WHERE `Phone` = '$phone'";
 
        // if($password == $password_repeat && $key == $email_key){
            
        //     $result_update = $connect->query($update);
        // }
        // else{
        //     header('Location: ../../autorization/autorization.php');
        // }
    }   
?>