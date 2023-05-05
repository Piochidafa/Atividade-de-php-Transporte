<?php

$emai = $_POST['email'];
$senha = $_POST['senha'];

$con = new PDO("mysql:host=localhost:3308;dbname=proj_principal_php", "root", "");

$sql = "INSERT INTO cadastropessoas (senha, email) VALUES (:senha, :emai)";


$stmt = $con->prepare($sql);


$stmt->bindvalue(':senha', $senha);
$stmt->bindvalue(':emai', $emai);

$stmt->execute();

header("location: ../../index.html");
exit;

?>













