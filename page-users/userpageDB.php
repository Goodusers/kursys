<?php
    session_start();
    require_once "../connect/connect.php";

    $id_accept = $_GET['add'];
    $id_reject = $_GET['del'];
    $reject_info = $_GET['comment'];

    if(isset($id_accept)){
       $query_accept = "UPDATE `Application` SET `Status` = 3 WHERE `Code_application` ='".$id_accept."'";
       $result_query = $connect->query($query_accept);
       header('Location: userpage.php');
    }
    if(isset($id_reject) && isset($reject_info) ){
        $query_reject = "UPDATE `Application` SET `Status` = 2,`Comment`='$reject_info' WHERE `Code_application` = '$id_reject'";
        $result_query = $connect->query($query_reject);
        header('Location: userpage.php');
    } 
?>
