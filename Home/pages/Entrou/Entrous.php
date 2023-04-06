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

    ?>

    <div class="Al">

        <div class="Area1">
            
        <div class="camimi">
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

        </div>



    </div>
    


</body>
</html>