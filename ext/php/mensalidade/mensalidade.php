<?php
include ("../../../conecta.php");
$conecta = new conecta();
if ($_POST["acao"] == "buscar") {
    // $data=$_POST["matricula"];
    // $obj = json_decode(stripslashes($data));
    
   
    
    $matricula = $_POST["matricula"];
    $queryString = "SELECT s.matricula, s.nome, c . * FROM socio s INNER JOIN cobranca c ON s.matricula = c.socioid WHERE s.matricula ='" . $matricula . "'";
    $query = $conecta->query($queryString);
    
    $contatos = array();
    
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "data" => $contatos
    ));
} elseif ($_POST["acao"] == "baixadocumento") {
    $idpagto = $_POST["idpagto"];
    $datapagto = date('Y-m-d', strtotime($_POST["datapagto"]));
    $queryString = "update cobranca set datapagto='" . $datapagto . "', situacao='pago' where idpagto = '" . $idpagto . "'";
    $query = $conecta->query($queryString);
    
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "data" => ""
    ));
} elseif ($_POST["acao"] == "estornardocumento") {
    $idpagto = $_POST["idpagto"];
    $queryString = "update cobranca set situacao='aberto' where idpagto = '" . $idpagto . "'";
    $query = $conecta->query($queryString);
    
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "data" => ""
    ));
} elseif ($_REQUEST["acao"] == "editarvalormensalidade") {
    $idpagto = $_REQUEST["idpagto"];
    $valor = $_REQUEST["valor"];
    $queryString = "update cobranca set valor='" . $valor . "' where idpagto = '" . $idpagto . "'";
    $query = $conecta->query($queryString);
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "data" => "sucesso"
    ));
} elseif ($_POST["acao"] == "naopossui") {
    echo json_encode(array(
        "success" => "true",
        "data" => ""
    ));
}
?>
