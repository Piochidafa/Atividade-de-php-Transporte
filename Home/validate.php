<?php
    session_start();
	
    $con = new PDO("mysql:host=localhost:3308;dbname=proj_principal_php", "root", "");

    $sql = "SELECT * FROM `cadastropessoas`";
	
    $stmt = $con->prepare($sql);

    $stmt->execute();

    $resul = $stmt->fetchALL();

    $emaiTrue = "";
    $passTrue = "";

    foreach($resul as $re){
        $emai = $re['email'];
        $sen = $re['senha'];
        
        if ($_POST['email']==$emai && $_POST['pass']==$sen){     
            $emaiTrue = $emai;
            $passTrue = $sen;         
        }
        
    if(isset($_POST['email'],$_POST['pass']) && $_POST['email']==$emaiTrue && $_POST['pass']==$passTrue){
        $_SESSION['usuario'] = $_POST['email'];
        header("Location:./pages/Entrou/EntrouVal.php");
    }else{
        
        header("Location:./senhainvalida.html");
    }   
    }

?>
