<?php
include ("../../../conecta.php");
$info = $_POST['data'];
$data = json_decode(stripslashes($info));
$matricula = $data->matricula;
$nome = $data->nome;
$query = "UPDATE socio SET ativo = 'S' WHERE matricula=" . $matricula . "";

$conecta = new conecta();

$rs = $conecta->query($query);

echo $conecta->getError();

echo json_encode(array(
    "success" => mysql_errno() == 0,
    "socios" => array(
        "matricula" => $matricula,
        "nome" => $nome
    )
));
?>