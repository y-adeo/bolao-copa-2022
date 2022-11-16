<?php
if(!$_SESSION['id']){
    header('location: login.php');
    exit();
}
?>