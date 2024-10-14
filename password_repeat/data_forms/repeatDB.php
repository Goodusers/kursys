<?php
     require_once "../../connect/connect.php";
     session_start();

     if(isset($_POST['phone'])){
          $phone = $_POST['phone'];
          $query = "SELECT * FROM `Users` WHERE `Phone` = '$phone'";
          $rs = $connect->query($query);
          
          $rs_mail = mysqli_fetch_assoc($rs);
          
          if(mysqli_num_rows($rs) > 0){
               
               $subject = 'Заявка с сайта';
               $message = $_POST['nums'];
               $mail = $rs_mail['Email'];
               $to = $mail;
               if( mail($to, $subject, $message)){
                    $_SESSION['phone'] = $phone;
                    // echo $_SESSION['phone'];
               }else{
                    $_SESSION['email'] = 'Письмо не отправлено!';
                    // echo $_SESSION['email'];
               }
          }
          
     }
?>