<?php


session_start();


if(!isset($_SESSION['usuario'])){
    header('Location: ../../');
    exit;
}else{
    header('Location:./Entrous.php');
}
?>