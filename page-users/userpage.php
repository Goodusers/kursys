<?php
    require_once "../header/header.php";
    require_once "../connect/connect.php";
    session_start();
    
    $select_application = "SELECT * FROM `Application` INNER JOIN `catalog` ON Application.id_catalog = catalog.id_catalog INNER JOIN `StatusOrder` ON StatusOrder.id = Application.Status WHERE Klient = '".$_SESSION['user']['id_users']."'";
    $result_application = $connect->query($select_application);

    $all_users = "SELECT * FROM `Application` INNER JOIN `catalog` ON Application.id_catalog = catalog.id_catalog INNER JOIN `StatusOrder` ON StatusOrder.id = Application.Status INNER JOIN `Users` ON Users.id_users = Application.Klient ORDER BY StatusOrder.id ASC";
    $result_all_users = $connect->query($all_users);

    $select_sent = "SELECT * FROM `Sent` INNER JOIN `Application` ON Sent.Code_application = Application.Code_application INNER JOIN `catalog` ON Application.id_catalog = catalog.id_catalog WHERE id_staff = '".$_SESSION['user_staff']['id_staff']."'";
    $query_sent = $connect->query($select_sent);

?>  
<body class="userpage">
<?php if(isset($_SESSION['user']) || isset($_SESSION['user_staff'])){?>
    <link rel="stylesheet" href="../../style.css">
    <?php
        switch(true){
            case $_SESSION['user']['Role'] == 1:?>
                <div class="button_panel">
                    <a href="edit_personal/edit_personal.php">Редактор курьеров</a>
                    <a href="edit_item_delivery/edit_item_delivery.php">Редактор доставок</a>
                    <a href="edit_main_page/edit_item_advantages.php">Редактор главной страницы</a>
                </div>
                <div class="admin_basket">   
             
                        <?php while($data = mysqli_fetch_assoc($result_all_users)){
                            if($data['Title'] != 'Отклонено'){?>
                           
                                <div class="my_history">
                                    <div class="title_history"><p><?=$data['name']?></p></div>
                                    <div class="img_orders"><img src="../images/<?=$data['photo']?>" alt="gruz"> </div>
                                    <div class="price_orders"><p><?=$data['Surname']?> &ensp; </p> <p><?=$data['Name']?></p></div>
                                    <div class="date"><p>Дата заявки <?=$data['Recording_date']?></p></div>
                                    <div class="goods"><p>Тип груза:  <?=$data['goods']?></p></div>
                                    <div class="goods"><p>Адрес доставки:  <?=$data['addressDeliv']?></p></div>
                                    <div class="goods"><p>Адрес отправки:  <?=$data['addressSend']?></p></div>
                                    <div class="date"><p>Дата отправки <?=$data['dateSend']?></p></div>
                                    <div class="date"><p>Дата доставки <?=$data['dateDeliv']?></p></div>
                            

                                    <?php if($data['Comment'] != NULL){?><div class="comment"><p>Причина отказа <?=$data['Comment']?></p></div><?php } ?>
                                    <?php if($data['Title'] == 'Отклонено'){?><div class="status_orders"><span style="background-color: red;"><?=$data['Title']?></span></div><?php }else{ ?>
                                        <div class="status_orders"><span><?=$data['Title']?></span></div>
                                    <?php } ?>
                                    <?php if($data['Title'] == 'Принято'){?> <div class="accepting_button"><a href="appoint/appoint.php?id_item=<?=$data['Code_application']?>">Назначить курьера</a></div><?php } ?>

                                    <form action="userpageDB.php" method="GET" class="button">
                                        <?php if($data['Status'] == 1){?>
                                            <td class="add"><a href="userpageDB.php?add=<?=$data['Code_application']?>" style="color: white; background-color: green;">Принять</a></td>
                                            <td class="reject"><a href="reject.php?del=<?=$data['Code_application']?>"  style="color: white; background-color: red;">Отклонить</a></td>
                                        <?php }?>
                                    </form>
                                </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['reject']) ){
            
                                    $order_reject = "SELECT * FROM `Application`";
                                    $result_reject_query = $connect->query($order_reject); 
                                    $result_query_update = mysqli_fetch_assoc($result_reject_query);
                                    
                                ?>
                                <div class="reject_block">
                    
                                    <form action="userpageDB.php" method="GET" class="rejecting_form">
                                        <input type="text" name="comment" placeholder="Введите причину отказа"  minlength="6" required>
                                        <input type="hidden" name="del" value="<?= $_GET['del']?>">
                                        <input type="submit" value="Отправить">
                                    </form>
                                </div>

                            <?php }  unset($_SESSION['reject']);?>
                        <?php }?>
                </div>
            <?php break;
            case $_SESSION['user']['Role'] == 2:?>  
                    <div class="button_panel">
                        <a href="edit_my_page/edit_my_page.php">Настройки профиля</a>
                    </div>
                    <div class="my_basket">
                        <?php while($data = mysqli_fetch_assoc($result_application)){?>
                            <div class="my_history">
                                <div class="title_history"><p><?=$data['name']?></p></div>
                                <div class="img_orders"><img src="../images/<?=$data['photo']?>" alt="gruz"> </div>
                                <div class="price_orders"><p><?=$data['cost']?>₽</p></div>
                                <div class="goods"><p>Тип груза:  <?=$data['goods']?></p></div>
                                <div class="goods"><p>Адрес доставки:  <?=$data['addressDeliv']?></p></div>
                                <div class="goods"><p>Адрес отправки:  <?=$data['addressSend']?></p></div>
                                <div class="date"><p>Дата отправки <?=$data['dateSend']?></p></div>
                                <div class="date"><p>Дата доставки <?=$data['dateDeliv']?></p></div>
                                <div class="status_orders"><span><?=$data['Title']?></span> <?php if($data['Title'] == 'Новая'){?><a href="reject_users.php?del=<?=$data['Code_application']?>">УДАЛИТЬ</a><?php } ?></div>
                            </div>
                        <?php } ?>
                    </div>
            <?php break;
            case isset($_SESSION['user_staff']):?> 
                    <div class="button_panel">
                        <a href="edit_my_page/edit_my_page.php">Настройки профиля</a>
                    </div>
                    <div class="my_basket">
                        <?php while($data = mysqli_fetch_assoc($query_sent)){?>
                            <?php if($data['Status_id'] != 5 || $data['Status'] != 5 ){ ?>
                                <div class="my_history">
                                    <div class="title_history"><p><?=$data['name']?></p></div>
                                    <div class="img_orders"><img src="../images/<?=$data['photo']?>" alt="gruz"> </div>
                                    <div class="price_orders"><p><?=$data['cost']?>₽</p></div>
                                    <div class="goods"><p>Тип груза:  <?=$data['goods']?></p></div>
                                    <div class="goods"><p>Адрес доставки:  <?=$data['addressDeliv']?></p></div>
                                    <div class="goods"><p>Адрес отправки:  <?=$data['addressSend']?></p></div>
                                    <div class="date"><p>Дата отправки <?=$data['dateSend']?></p></div>
                                    <div class="date"><p>Дата доставки <?=$data['dateDeliv']?></p></div>
                                    <div class="button_item"> <a href="kur_up_st.php?applicationPR=<?=$data['Code_application']?>&sentPR=<?=$data['Code_application']?>">Получил</a></div>
                                    <div class="button_item"> <a href="kur_up_st.php?applicationD=<?=$data['Code_application']?>&sentD=<?=$data['Code_application']?>">Доставил</a></div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
              <?php break;
        }
    ?>
<?php }else{header('Location: /');} ?>
</body>