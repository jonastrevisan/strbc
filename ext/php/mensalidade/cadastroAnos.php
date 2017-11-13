<?php
include ("../../../conecta.php");
$matricula = $_POST["matricula"];
$valor = $_REQUEST["valor"];
$ano = $_REQUEST["ano"];
$situacao = $_REQUEST["situacao"];
$datapagto = date('Y-m-d', strtotime($_POST["datapagto"]));
// $TodosPagos=$_REQUEST["todospagos"];

$meses = array(
    'Janeiro',
    'Fevereiro',
    'Marco',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
);
$count = count($meses);
$conecta = new conecta();
$sucesso;
for ($i = 0; $i < $count; $i ++) {
    $sql = "insert into cobranca (socioid,ano,mes,datapagto,valor,situacao) values('" . $matricula . "','" . $ano . "','" . $meses[$i] . "','" . $datapagto . "','" . $valor . "','" . $situacao . "')";
    
    $query = $conecta->query($sql);
    $sucesso = mysql_errno() == 0;
}
echo json_encode(array(
    "success" => $sucesso,
    "data" => ""
));
