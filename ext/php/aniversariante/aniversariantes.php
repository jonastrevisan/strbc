<?php
// chama o arquivo de conexão com o bd
include ("../../../conecta.php");

$field = empty($_REQUEST['filter'][0]['field']) ? null : $_REQUEST['filter'][0]['field'];
$value = empty($_REQUEST['filter'][0]['data']['value']) ? null : $_REQUEST['filter'][0]['data']['value'];
$type = empty($_REQUEST['filter'][0]['data']['type']) ? null : $_REQUEST['filter'][0]['data']['type'];
$numerico = empty($_REQUEST['filter'][0]['data']['comparison']) ? null : $_REQUEST['filter'][0]['data']['comparison'];
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];
$dia = 0;
$mes = 0;
if ($type == "date") {
    $value = date("Y-m-d", strtotime($value));
    $dia = date("d", strtotime($value));
    $mes = date("m", strtotime($value));
}
$conecta = new conecta();
if (empty($value) || $value == '') {
    
    $queryString = "SELECT matricula, nome, datanascimento FROM socio WHERE MONTH( datanascimento ) = MONTH( NOW( ) ) and ativo = 'S' ORDER BY matricula ASC LIMIT $start,  $limit";
    $query = $conecta->query($queryString);
    $contatos = array();
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    // consulta total de linhas na tabela
    $queryTotal = $conecta->query("SELECT count(matricula) as num FROM socio WHERE MONTH( datanascimento ) = MONTH( NOW( ) ) and ativo = 'S'") or die(mysql_error());
    $row = $queryTotal->fetch_assoc();
    $total = $row['num'];
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "total" => $total,
        "data" => $contatos
    ));
} else {
    $queryString = "";
    $queryNumber = "";
    if (empty($numerico)) {
        $queryString = "SELECT matricula, nome, datanascimento FROM socio WHERE MONTH( datanascimento ) = MONTH( NOW( ) ) and ativo = 'S' and $field LIKE '%" . $value . "%' ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio where ativo = 'S' and $field LIKE '%" . $value . "%'";
    } elseif ($numerico == "eq") {
        $queryString = "SELECT matricula, nome, datanascimento FROM socio WHERE MONTH( $field ) = " . $mes . " and DAY( $field ) = " . $dia . " and ativo = 'S' ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio WHERE MONTH( $field ) = " . $mes . " and DAY( $field ) = " . $dia . " and ativo = 'S'";
    } elseif ($numerico == "lt") {
        $queryString = "SELECT matricula, nome, datanascimento FROM socio WHERE ativo = 'S' and $field <= '" . $value . "' ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio WHERE ativo = 'S' and $field <= '" . $value . "'";
    } elseif ($numerico == "gt") {
        $queryString = "SELECT matricula, nome, datanascimento FROM socio WHERE ativo = 'S' and $field >= '" . $value . "' ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio  WHERE ativo = 'S' and $field >= '" . $value . "'";
    }
    $query = $conecta->query($queryString);
    $contatos = array();
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    $queryTotal = $conecta->query($queryNumber); // and $field = $value
    $row = $queryTotal->fetch_assoc();
    $total = $row['num'];
    
    // encoda para formato JSON
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "total" => $total,
        "data" => $contatos,
        "datanascimento" => $queryNumber
    
    ));
}

?>