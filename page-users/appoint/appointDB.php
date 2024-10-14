<?php
    require_once "../../connect/connect.php";
    session_start();

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $id_item = $_GET['id_item'];

        $get_info_users = "SELECT * FROM `Staff` WHERE `id_staff` = $id";
        $result_get = $connect->query($get_info_users);

        if(mysqli_num_rows($result_get) > 0){
            $assoc_array = mysqli_fetch_assoc($result_get);

            $name = $assoc_array['Name'];
            $surname = $assoc_array['Surname'];
            $phone = $assoc_array['Phone'];

            $insert_appoint = "INSERT INTO `Sent`(`id_sent`, `Name`, `Surname`, `id_staff`, `Code_application`, `Status_id`, `Phone`) VALUES (NULL,'$name','$surname', $id, $id_item, 6, '$phone')";
            $rs_ins = $connect->query($insert_appoint);

            $update_app = "UPDATE `Application` SET `Status`='6'  WHERE `Code_application` = $id_item";
            $rs_up = $connect->query($update_app);

            $update_staff = "UPDATE `Staff` SET `id_status`='6'  WHERE `id_staff` = $id";
            $rs_staff = $connect->query($update_staff);

            header('Location: ../userpage.php');


        }
    }

?>