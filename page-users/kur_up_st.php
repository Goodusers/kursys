<?php
    require_once "../connect/connect.php";
    session_start();
    $applicationPR = $_GET['applicationPR'];
    $sentPR = $_GET['sentPR'];

    $applicationD= $_GET['applicationD'];
    $sentD = $_GET['sentD'];

    $id = $_SESSION['user_staff']['id_staff'];

    if(isset($applicationPR) || isset($sentPR)){
        $up_app = "UPDATE `Sent` SET `Status_id`= 4  WHERE `Code_application` = $sentPR";
        $res_app = $connect->query($up_app);

        $up = "UPDATE `Application` SET `Status`= 4  WHERE `Code_application` =  $applicationPR";
        $res_app = $connect->query($up);

        $up_st = "UPDATE `Staff` SET `id_status`= 4  WHERE `id_staff` =  $id";
        $res_st = $connect->query($up_st);
        header('Location: userpage.php');
  
    }
    if(isset($applicationD) || isset($sentD)){
        $up_app = "UPDATE `Sent` SET `Status_id`= 5  WHERE `Code_application` = $sentD";
        $res_app = $connect->query($up_app);

        $up = "UPDATE `Application` SET `Status`= 5  WHERE `Code_application` =  $applicationD";
        $res_app = $connect->query($up);

        $up_st = "UPDATE `Staff` SET `id_status`= 5  WHERE `id_staff` =  $id";
        $res_st = $connect->query($up_st);
     
        header('Location: userpage.php');
    }
?>