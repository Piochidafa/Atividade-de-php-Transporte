<?php

session_start();

    if(!isset($_SESSION['usuario'])){
    header('Location: ../../');
    exit;
    }



    $val = $_GET['x'];


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
    <title>pagamento</title>
    <link rel="stylesheet" href="pagamento.css">
</head>
<body>
    
    <div class="pagpag">
        <a href="../Entrou/Entrous.php">
            <img class="exit" src="./assets/exit-svgrepo.svg" alt="">
        </a>
        <div class="content">
            <div class="reader">
                <label>CARTÃO DE CRÉDITO</label>
                <img class="cartao" src="./assets/credit-card-svgrepo.svg" alt="">
            </div>
            <div class="infos">
                
                <img class="cartaozinho" src="./assets/payment-security-lock-svgrepo-com.svg" alt="">
                <form action="">
                    <div class="alin">
                        <label class="labe">Número do cartão</label>
                        <input class="inp" type="number">
                    </div>
                    <div class="doisCampos">
                        <div class="alin">
                            <label class="labe">Validade</label>
                            <input class="inpdos" type="number">
                        </div>
                        <div class="alin">
                            <label class="labe">Código de segurança</label>
                            <input class="inpdos" type="number">
                        </div>
                    </div>
                    <div class="alin">
                        <label class="labe">Nome completo</label>
                        <input class="inp" type="text">
                    </div>
                    <div class="alin">
                        <label class="labe">CPF</label>
                        <input class="inp" type="number">
                    </div>
                    <div class="doisCampos">
                        <div class="alin">
                            <label class="labe">Telefone</label>
                            <input class="inpdos" type="text">
                        </div>
                        <div class="alin">
                            <label class="labe">Data de nascimento</label>
                            <input class="inpdos" type="text">
                        </div>
                    </div>
                    <div class="alin">
                        <label class="labe">Nome completo</label>
                        <input class="inp" type="text">
                    </div>
                    <div class="alin">
                        <label class="labe">Parcelas</label>
                        <select class="inp">
                            <?php
                                echo "<option>1x de R$ ".$val." sem juros</option>";
                                echo "<option>2x de R$ ".inteiro_decimal_br($val/2)." sem juros</option>";
                                echo "<option>3x de R$ ".inteiro_decimal_br($val/3)." sem juros</option>";
                                echo "<option>4x de R$ ".inteiro_decimal_br($val/4)." sem juros</option>";
                                echo "<option>5x de R$ ".inteiro_decimal_br($val/5)." sem juros</option>";
                                echo "<option>6x de R$ ".inteiro_decimal_br($val/6)." sem juros</option>";
                                echo "<option>7x de R$ ".inteiro_decimal_br($val/7)." sem juros</option>";
                                echo "<option>8x de R$ ".inteiro_decimal_br($val/8)." sem juros</option>";
                                echo "<option>9x de R$ ".inteiro_decimal_br($val/9)." sem juros</option>";
                                echo "<option>10x de R$ ".inteiro_decimal_br($val/10)." sem juros</option>";
                                echo "<option>11x de R$ ".inteiro_decimal_br($val/11)." sem juros</option>";
                                echo "<option>12x de R$ ".inteiro_decimal_br($val/12)." sem juros</option>";
                            ?>
                        </select>
                    </div>    
                </form>
                <div class="Cconfi">

                    <input class="confirmacao" type="button" value="Confirmar pagamento">
                </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>