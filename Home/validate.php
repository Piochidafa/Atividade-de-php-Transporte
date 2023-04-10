

<?php 

session_start();


$emai = $_POST['email'];
$pass = $_POST['pass'];


$emaiTrue = 'junin@gmail.com';
$passTrue = 'senha12';

if(isset($_POST['email'],$_POST['pass'])){

    if ($_POST['email']==$emaiTrue && $_POST['pass']==$passTrue){
        $_SESSION['usuario'] = $_POST['email'];
        header("Location:./pages/Entrou/EntrouVal.php");
        
        
        
    }else{
        echo 'Login invalido';
    }
    
}
?>
