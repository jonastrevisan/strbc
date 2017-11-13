<?php
include ("../../../conecta.php");
$info = $_POST['data'];
$data = json_decode(stripslashes($info));

$conecta = new conecta();

$matricula = $data->matricula;
$nome = $data->nome;
$query = "UPDATE socio SET ativo = 'N' WHERE matricula=" . $matricula;

$rs = $conecta->query($query);

echo json_encode(array(
    "success" => mysql_errno() == 0,
    "socios" => array(
        "matricula" => $matricula,
        "nome" => $nome
    )

));

?>