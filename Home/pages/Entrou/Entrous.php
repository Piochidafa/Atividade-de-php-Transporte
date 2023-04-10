<?php

    session_start();


if(!isset($_SESSION['usuario'])){
    header('Location: ../../');
    exit;
}


function inteiro_decimal_br($numero)
{
    $numero = number_format($numero, 2, ',', '.');
    return $numero;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrou</title>
    <link rel="stylesheet" href="Entrou.css">
</head>
<body>
    

 <?php




    error_reporting(0);
    
    $cep = $_POST['cep'];
    $url = "viacep.com.br/ws/{$cep}/json/";
    // $url = "viacep.com.br/ws/78099160/json/";
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $resultado = json_decode(curl_exec($ch));
    
    // var_dump($resultado);
    // var_dump(gettype($resultado->siafi));
    // var_dump(gettype($resultado->bairro));
    // var_dump(($resultado->siafi));


    $sisi = intval($resultado->siafi);

    if($resultado->siafi == null){

        $pr = "---";
        $sg = "---";
        $tr = "---";
        $qt = "---";
    }else{

        $pr =   inteiro_decimal_br($sisi*(10/100));
        $sg =   inteiro_decimal_br($sisi*(5/100));
        $tr =   inteiro_decimal_br($sisi*(2/100));
        $qt =   inteiro_decimal_br($sisi*(0.6/100));
    }
    
    
    

    ?>

    <div class="Al">

        <div class="Area1">
            <div class="camimi">
            <div class="getout">
                <a href="../../">
                    <img src="./assets/exit-svgrepo.svg" alt="">
                </a>
            </div>
            <img class="cami" src="./assets/delivery-truck-svgrepo-com.svg" alt="caminhão">
            <h1 class="h1">API TRANSPORTE</h1>
        </div>

            <form class="consulta" action="Entrous.php" method="post">
                

            <div class="alinha">
                <label for="cep">DIGITE O CEP PARA CONSULTA</label>
                <input class="inp1" type="number" name="cep">
                <input class="inp2" type="submit" value="Consultar Valores">
            </div>
                
            <div class="alinha ph">
                
                <?php 
                    // var_dump($resultado);
                    
                if($resultado->bairro == null){
                    echo "<h1 class='letras'>Cep não encontrado</h1>";
                }else{
                    echo "<h1 class='letras'>". $resultado->bairro . "</h1>";
                    echo "<h1>". $resultado->logradouro . "</h1>";
                    echo "<h1>". $resultado->localidade . "</h1>";
                }
                ?>
            </div>
            </form>
            

        </div>
        <div class="Area2">
            <div class="A2Infos">

                <!-- ==============================================================    -->
            

                <div class="A2opts">
                    <div class="A2IMNO">
                        <img class="imagi" src="./assets/date-svgrepo-com.svg" alt="">
                     <div class="A2Innf">       
                            <p class="innfp">TRANSPORTE EXPRESSO</p>
                          <span>Transporte mais veloz porém um valor mais elevado.</span>
                        </div>
                    </div>    
                        <div class="A2valores">
                            <!-- <p class="P">R$4444</p> -->
                        <?php echo "<p class='P'>R$".$pr."</p>"?>
                        <a href="../pagamento/pagamento.php?x=<?=$pr;?>">
                            <input type="button" value="Comprar">
                        </a>
                        </div>
                    </div>
                    <!-- ==============================================================    -->

                   
                    <div class="A2opts">
                    <div class="A2IMNO">
                        <img class="imagi" src="./assets/truck-urgent-svgrepo-com.svg" alt="">
                     <div class="A2Innf">       
                            <p class="innfp">TRANSPORTE SEM PARAR</p>
                          <span>Transporte com entregas a todos os dias não importa fim de semana nem feriado.</span>
                        </div>
                    </div> 
                    <div class="A2valores">
                        <!-- <p class="P">R$4444</p> -->
                        <?php echo "<p class='P'>R$".$sg."</p>"?>
                        <a href="../pagamento/pagamento.php?x=<?=$sg;?>">
                        <input type="button" value="Comprar">
                        </a>
                    </div>
                </div>
                <!-- ==============================================================    -->




                <div class="A2opts">
                    <div class="A2IMNO">
                        <img class="imagi" src="./assets/moped-retro-svgrepo-com.svg" alt="">
                     <div class="A2Innf">       
                            <p class="innfp">TRANSPORTE QUASE PARANDO</p>
                          <span>Transporte mais devagar e sem pressa porem um valor menor.</span>
                        </div>
                    </div>    
                        <div class="A2valores">
                            <!-- <p class="P">R$4444</p> -->
                            <?php echo "<p class='P'>R$".$tr."</p>"?>

                            <a href="../pagamento/pagamento.php?x=<?=$tr;?>">
                                <input type="button" value="Comprar">
                            </a>
                        </div>
                    </div>
                    <!-- ==============================================================    -->

                    <div class="A2opts">
                    <div class="A2IMNO">
                        <img class="imagi" src="./assets/run-svgrepo-com.svg" alt="">
                     <div class="A2Innf">       
                            <p class="innfp">TRANSPORTE SEM RESPONSABILIDADE</p>
                          <span>Transporte quase parando pelo fato do entregador entregar quando quiser e se reclamar ele ainda abre a caixa.</span>
                        </div>
                    </div>    
                        <div class="A2valores">
                            <!-- <p class="P">R$20,00</p> -->
                            <?php echo "<p class='P'>R$".$qt."</p>"?>
                            <a href="../pagamento/pagamento.php?x=<?=$qt;?>">
                            <input type="button" value="Comprar">
                            </a>
                        </div>
                    </div>

            </div>
            
        </div>



    </div>
    


</body>
</html>