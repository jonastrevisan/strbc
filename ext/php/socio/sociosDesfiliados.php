<?php 
include ("../../../conecta.php");

$field = empty($_REQUEST['filter'][0]['field']) ? null : $_REQUEST['filter'][0]['field'];
$value = empty($_REQUEST['filter'][0]['data']['value']) ? null : $_REQUEST['filter'][0]['data']['value'];
$numerico = empty($_REQUEST['filter'][0]['data']['comparison']) ? null : $_REQUEST['filter'][0]['data']['comparison'];
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];

$conecta = new conecta();

if (empty($value) || $value == '') {
    
    $queryString = "SELECT * FROM socio where ativo = 'N' ORDER BY matricula ASC LIMIT $start,  $limit";
    $query = $conecta->query($queryString);
    $contatos = array();
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    // consulta total de linhas na tabela
    $queryTotal = $conecta->query("SELECT count(matricula) as num FROM socio where ativo = 'N'") or die(mysql_error());
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
        $queryString = "SELECT matricula,nome FROM socio where ativo = 'N' and $field LIKE '%" . $value . "%' ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio where ativo = 'N' and $field LIKE '%" . $value . "%'";
    } elseif ($numerico == "eq") {
        $queryString = "SELECT * FROM socio where ativo = 'N' and $field = $value ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio where ativo = 'N' and $field = $value";
    } elseif ($numerico == "lt") {
        $queryString = "SELECT * FROM socio where ativo = 'N' and $field <= $value ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio where ativo = 'N' and $field <= $value";
    } elseif ($numerico == "gt") {
        $queryString = "SELECT * FROM socio where ativo = 'N' and $field >= $value ORDER BY matricula ASC LIMIT $start,  $limit";
        $queryNumber = "SELECT count(matricula) as num FROM socio where ativo = 'N' and $field >= $value";
    }
    $query = $conecta->query($queryString);
    $contatos = array();
    while ($contato = $query->fetch_assoc()) {
        $contatos[] = $contato;
    }
    
    $queryTotal = mysql_query($queryNumber) or die(mysql_error()); // and $field = $value
    $row = mysql_fetch_assoc($queryTotal);
    $total = $row['num'];
    
    echo json_encode(array(
        "success" => mysql_errno() == 0,
        "total" => $total,
        "data" => $contatos
    
    ));
}

?>