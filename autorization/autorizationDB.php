<?php
    require_once "../connect/connect.php";
    session_start();

    if(isset($_POST['phone']) && isset($_POST['password'])){
        $phone = htmlspecialchars($_POST['phone']);
        $password = htmlspecialchars($_POST['password']);

        $query_users = $connect->query("SELECT * FROM `Users` WHERE `Phone` = '$phone' AND `Password` = '$password' ");  
        $result = mysqli_fetch_assoc($query_users);

        $staff = $connect->query("SELECT * FROM `Staff` WHERE `Phone` = '$phone' AND `Password` = '$password' ");
        $result_staff = mysqli_fetch_assoc($staff);

        if($result){           
            $_SESSION['user'] = $result;
            header('Location: ../page-users/userpage.php');
        }
        elseif($result_staff){
            $_SESSION['user_staff'] = $result_staff;
            header('Location: ../page-users/userpage.php');
        }  
        else{
            // $_SESSION['message'] = '';
        }
       
    } 
?>