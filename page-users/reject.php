<?php
    session_start();
    if(!empty($_GET['del'])) {
    $_SESSION['reject'] = "Введите причину отказа";
    header('Location: userpage.php?del='.$_GET['del']);
}
