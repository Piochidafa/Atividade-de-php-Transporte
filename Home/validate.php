

<?php 

session_start();

$emai = $_POST['email'];
$pass = $_POST['pass'];


$emaiTrue = 'junin@gmail.com';
$passTrue = 'senha12';

if ($emai == $emaiTrue and $pass == $passTrue){

    header("Location:./pages/Entrou/Entrou.html   ");



}else{
    echo 'Login invalido';
}

?>
